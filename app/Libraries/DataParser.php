<?php

namespace App\Libraries;

use CodeIgniter\Files\File;
use Exception;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class DataParser
{
    public function parse(File $file, $step)
    {
        try {
            if (!($excel = IOFactory::load($file->getRealPath()))) {
                throw new Exception("Can't read data");
            }
            $incol = 0;
            foreach ($excel->getSheet(0)->getRowIterator() as $index => $row) {
                if ($index == 1) {
                    foreach ($row->getCellIterator() as $cell) {
                        $header[] = [
                            'title' => $cell->getValue(),
                            'min' => PHP_FLOAT_MAX,
                            'max' => PHP_FLOAT_MIN
                        ];
                        $incol++;
                    }
                    continue;
                }
                $incel = -1;
                foreach ($row->getCellIterator() as $cell) {
                    if ((++$incel) === 0) {
                        $ikey = $cell->getCalculatedValue();
                        continue;
                    } else if ($incel > $incol)
                        break;
                    $data[$ikey][] = $val = $cell->getCalculatedValue();
                    $header[$incel]['min'] = min($header[$incel]['min'], $val);
                    $header[$incel]['max'] = max($header[$incel]['max'], $val);
                }
            }
            return [
                'header' => $header ?? [],
                'data' => $data,
                'step' => $step,
            ];
        } catch (\Throwable $th) {
            echo $th->getMessage();
            exit;
        } finally {
            unlink($file->getRealPath());
        }
    }

    public function write($data) : Xlsx
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        foreach ($data->header as $ih => $head) {
            $sheet->getCellByColumnAndRow($ih + 1, 1)->setValue($head->title);
        }
        $id = 1;
        foreach ($data->data as $date => $data) {
            $sheet->getCellByColumnAndRow(1, ++$id)->setValue($date);
            foreach ($data as $ic => $cell) {
                $sheet->getCellByColumnAndRow(2 + $ic, $id)->setValue($cell);
            }
        }
        $sheet->getStyleByColumnAndRow(1, 2, 1, 1 + $id)->getNumberFormat()->setFormatCode(
            \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_DDMMYYYY
        );

        return new Xlsx($spreadsheet);
    }
}
