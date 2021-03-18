<?php

use CodeIgniter\Entity;
use CodeIgniter\I18n\Time;
use Config\Services;

/**
 * The goal of this file is to allow developers a location
 * where they can overwrite core procedural functions and
 * replace them with their own. This file is loaded during
 * the bootstrap process and is called during the frameworks
 * execution.
 *
 * This can be looked at as a `master helper` file that is
 * loaded early on, and may also contain additional functions
 * that you'd like to use throughout your entire application
 *
 * @link: https://codeigniter4.github.io/CodeIgniter4/
 */

function find_with_filter(\CodeIgniter\Model $model, int $length = 500)
{
    $req = Services::request();
    $page = intval($req->getGet('page'));
    $size = intval($req->getGet('size'));
    $offset = intval($req->getGet('offset'));
    if ($size === 0) $size = $length;
    else if ($size < 0) $size = 0;
    if ($offset === 0)
        $offset = max(0, $page - 1) * $size;
    // if ($offset > 0)
    $c = $model->countAllResults(false);
    // getting the C makes this easier to reverse
    $o = $c - ($offset + 1) - ($c % $size);
    $r = $model->findAll($size + min(0, $o), max(0, $o));
    $r = array_reverse($r);
    // generate pagination
    $_SERVER['pagination'] = [
        'page' => ($size == 0 ? 0 : floor($offset / $size)) + 1,
        'max' => isset($c) ? ceil($c / $size) : ceil((count($r) + 1) / $size),
        'certain' => isset($c),
    ];
    return $r;
}

function get_gravatar($email, $s = 80, $d = 'mp', $r = 'g')
{
    $url = 'https://www.gravatar.com/avatar/';
    $url .= md5(strtolower(trim($email)));
    $url .= "?s=$s&d=$d&r=$r";
    return $url;
}

function get_excerpt($content, $length = 40, $more = '...')
{
    $excerpt = strip_tags(trim($content));
    $words = str_word_count($excerpt, 2);
    if (count($words) > $length) {
        $words = array_slice($words, 0, $length, true);
        end($words);
        $position = key($words) + strlen(current($words));
        $excerpt = substr($excerpt, 0, $position) . $more;
    }
    return $excerpt;
}

function post_file(Entity $entity, $name, string $folder = null)
{
    if (!is_dir($path  = WRITEPATH . implode(DIRECTORY_SEPARATOR, ['uploads', $folder ?? $name, '']))) {
        mkdir($path, 0775, true);
    }
    $req = Services::request();
    $file = $req->getFile($name);
    if ($file && $file->isValid() && $file->move($path)) {
        if ($entity->{$name} && is_file($path . $entity->{$name})) {
            unlink($path . $entity->{$name});
        }
        $entity->{$name} = $file->getName();
    } else if ($req->getPost('_' . $name) === 'delete') {
        if ($entity->{$name} && is_file($path . $entity->{$name})) {
            unlink($path . $entity->{$name});
        }
        $entity->{$name} = null;
    }
}

function post_files(Entity $entity, $name, string $folder = null)
{
    if (!is_dir($path  = WRITEPATH . implode(DIRECTORY_SEPARATOR, ['uploads', $folder ?? $name, '']))) {
        mkdir($path, 0775, true);
    }
    $req = Services::request();
    $files = $req->getFileMultiple($name);
    $new_files = [];
    foreach ($files as $file) {
        if ($file && $file->isValid() && $file->move($path)) {
            $new_files[] = $file->getName();
        }
    }
    if ($new_files && is_array($entity->{$name})) {
        foreach ($entity->{$name} as $old_file) {
            if ($old_file && is_file($path . $old_file)) {
                unlink($path . $old_file);
            }
        }
        $entity->{$name} = $new_files;
    }
}

function humanize(Time $time)
{
    $now  = IntlCalendar::fromDateTime(Time::now($time->timezone)->toDateTimeString());
    $time = $time->getCalendar()->getTime();

    $years   = $now->fieldDifference($time, IntlCalendar::FIELD_YEAR);
    $months  = $now->fieldDifference($time, IntlCalendar::FIELD_MONTH);
    $days    = $now->fieldDifference($time, IntlCalendar::FIELD_DAY_OF_YEAR);
    $hours   = $now->fieldDifference($time, IntlCalendar::FIELD_HOUR_OF_DAY);
    $minutes = $now->fieldDifference($time, IntlCalendar::FIELD_MINUTE);

    $phrase = null;

    if ($years !== 0) {
        $phrase = lang('Time.years', [abs($years)]);
        $before = $years < 0;
    } else if ($months !== 0) {
        $phrase = lang('Time.months', [abs($months)]);
        $before = $months < 0;
    } else if ($days !== 0 && (abs($days) >= 7)) {
        $weeks  = ceil($days / 7);
        $phrase = lang('Time.weeks', [abs($weeks)]);
        $before = $days < 0;
    } else if ($days !== 0) {
        $before = $days < 0;

        // Yesterday/Tomorrow special cases
        if (abs($days) === 1) {
            return $before ? lang('Time.yesterday') : lang('Time.tomorrow');
        }

        $phrase = lang('Time.days', [abs($days)]);
    } else if ($hours !== 0) {
        $phrase = lang('Time.hours', [abs($hours)]);
        $before = $hours < 0;
    } else if ($minutes !== 0) {
        $phrase = lang('Time.minutes', [abs($minutes)]);
        $before = $minutes < 0;
    } else {
        return lang('Time.now');
    }

    return $before ? lang('Time.ago', [$phrase]) : lang('Time.inFuture', [$phrase]);
}

function check_etag($path)
{
    $last_modified_time = filemtime($path);
    $etag = md5_file($path);
    header("Last-Modified: " . gmdate("D, d M Y H:i:s", $last_modified_time) . " GMT");
    header("Etag: $etag");
    header("Cache-Control: public");
    header_remove('Pragma');
    if (
        strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE'] ?? '') == $last_modified_time ||
        trim($_SERVER['HTTP_IF_NONE_MATCH'] ?? '') == $etag
    ) {
        header("HTTP/1.1 304 Not Modified");
        exit;
    }
}
