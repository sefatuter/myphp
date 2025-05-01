<?php

class RateLimiter {
    public static function limit(string $key, int $maxAttempts = 5, int $seconds = 60): bool {
        $ip = $_SERVER['REMOTE_ADDR'];
        $path = sys_get_temp_dir() . "/ratelimit_" . md5($key . $ip);

        if (!file_exists($path)) {
            file_put_contents($path, json_encode(['count' => 1, 'start' => time()]));
            return false;
        }

        $data = json_decode(file_get_contents($path), true);
        if (time() - $data['start'] > $seconds) {
            // Reset after time passes
            file_put_contents($path, json_encode(['count' => 1, 'start' => time()]));
            return false;
        }

        if ($data['count'] >= $maxAttempts) {
            return true; // blocked
        }

        $data['count']++;
        file_put_contents($path, json_encode($data));
        return false;
    }
}
