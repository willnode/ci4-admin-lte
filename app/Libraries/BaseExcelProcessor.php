<?php

// if you use this, please run composer require phpoffice/phpspreadsheet

namespace App\Libraries;

use CodeIgniter\HTTP\Files\UploadedFile;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Config\Database;
use Exception;

class BaseExcelProcessor
{
    // db to import / export
    public $table;

    // array of object { key, title } represent excel columns
    public $columns;

    // first arg: array row from excel, return array row to insert
    public $importModifier = null;

    // first arg: array row from data, return array row to excel
    public $exportModifier = null;

    public function exportAndSend(array $data, string $filename = null)
    {

        if (!$filename) {
            $filename = date('Ymd') . '-' . ucfirst($this->table);
        }

        try {
            $excel = $this->export($data);
            $excel->save('php://output');
            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header("Content-Disposition: attachment;filename=" . rawurlencode($filename) . ".xlsx");
        } catch (\Throwable $th) {
            throw $th;
        }

        exit;
    }

    public function import(UploadedFile $file)
    {
        try {
            if (!$file || !$file->isValid()) {
                throw new Exception("File is missing");
            }
            if (!($excel = IOFactory::load($file->getRealPath()))) {
                throw new Exception("Can't read data");
            }
            $data = $excel->getSheet(0)->toArray();
            $excel->disconnectWorksheets();
            $excel->garbageCollect();

            $db = Database::connect();
            $db->transBegin();
            $table = $db->table($this->table);
            $count = 0;
            $keys = array_map(function ($x) {
                return $x['key'];
            }, $this->columns);
            $ckeyc = count($keys);
            foreach ($data as $i => $row) {
                if ($i == 0) continue;
                $cvalc = count($row);
                if ($cvalc > $ckeyc) {
                    $row = array_slice($row, 0, $ckeyc);
                } else if ($cvalc < $ckeyc) {
                    $row = array_pad($row, $ckeyc, '');
                }
                $combined = array_combine($keys, $row);
                if ($this->importModifier) {
                    if (!($combined = call_user_func_array($this->importModifier, array($combined)))) {
                        continue;
                    }
                }
                if (!$table->ignore()->insert($combined)) {
                    throw new Exception('Insert Fail');
                } else if (!$db->affectedRows()) {
                    $combinedkey = [
                        $keys[0] => $combined[$keys[0]],
                    ];
                    unset($combined[$keys[0]]);
                    $table->update($combined, $combinedkey);
                }
                $count += $db->affectedRows();
            }
            $db->transComplete();
            return $count;
        } catch (\Throwable $th) {
            echo $th->getMessage();
            echo '<br> fail when processing: ' . json_encode($row ?? []);
            exit;
        } finally {
            unlink($file->getRealPath());
        }
    }

    public function export($data): Xlsx
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $columns = array_map(function ($x) {
            return $x['title'] ?? ucfirst($x['key']);
        }, $this->columns);
        /* header */
        foreach ($columns as $key => $value) {
            $sheet->getCell([$key + 1, 1])->setValue($value);
            $spreadsheet->getActiveSheet()->getColumnDimensionByColumn($key + 1)->setAutoSize(true);
        }
        foreach ($data as $i => $row) {
            if ($this->exportModifier) {
                if (!($row = call_user_func_array($this->exportModifier, array($row)))) {
                    continue;
                }
                if (is_array($row)) {
                    $row = (object)$row;
                }
            }
            foreach ($this->columns as $c => $column) {
                $sheet->getCell([$c + 1, $i + 2])->setValue($row->{$column['key']} ?? '');
            }
        }

        return new Xlsx($spreadsheet);
    }
}
