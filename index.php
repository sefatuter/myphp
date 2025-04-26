<?php
// File Explorer
$baseDir = __DIR__;
$path = $_GET['path'] ?? '';
$currentDir = realpath($baseDir . '/' . $path);
$sort = $_GET['sort'] ?? 'name';
$order = $_GET['order'] ?? 'asc';

if (!$currentDir || strpos($currentDir, $baseDir) !== 0) {
    die("❌ Invalid path.");
}

$items = scandir($currentDir);

$items = array_filter($items, function($item) use ($path) {
    if ($item === '.') return false;
    if ($item === '..' && !$path) return false;
    return true;
});

$itemsData = [];
foreach ($items as $item) {
    $fullPath = $currentDir . '/' . $item;
    $itemsData[] = [
        'name' => $item,
        'isDir' => is_dir($fullPath),
        'size' => is_file($fullPath) ? filesize($fullPath) : 0,
        'modified' => filemtime($fullPath),
        'type' => pathinfo($item, PATHINFO_EXTENSION)
    ];
}

usort($itemsData, function($a, $b) use ($sort, $order) {
    if ($a['isDir'] !== $b['isDir']) {
        return $a['isDir'] ? -1 : 1;
    }
    
    $result = 0;
    switch ($sort) {
        case 'name':
            $result = strcasecmp($a['name'], $b['name']);
            break;
        case 'size':
            $result = $a['size'] <=> $b['size'];
            break;
        case 'modified':
            $result = $a['modified'] <=> $b['modified'];
            break;
        case 'type':
            $result = strcasecmp($a['type'], $b['type']);
            break;
    }
    
    return $order === 'asc' ? $result : -$result;
});

function formatFileSize($bytes) {
    $units = ['B', 'KB', 'MB', 'GB', 'TB'];
    $i = 0;
    while ($bytes >= 1024 && $i < count($units) - 1) {
        $bytes /= 1024;
        $i++;
    }
    return round($bytes, 2) . ' ' . $units[$i];
}

function getFileIcon($item) {
    if ($item['isDir']) {
        return '<i class="fas fa-folder"></i>';
    }

    $extension = strtolower($item['type']);
    switch ($extension) {
        case 'pdf':
            return '<i class="fas fa-file-pdf"></i>';
        case 'doc':
        case 'docx':
            return '<i class="fas fa-file-word"></i>';
        case 'xls':
        case 'xlsx':
            return '<i class="fas fa-file-excel"></i>';
        case 'ppt':
        case 'pptx':
            return '<i class="fas fa-file-powerpoint"></i>';
        case 'jpg':
        case 'jpeg':
        case 'png':
        case 'gif':
        case 'bmp':
        case 'svg':
            return '<i class="fas fa-file-image"></i>';
        case 'mp3':
        case 'wav':
        case 'ogg':
            return '<i class="fas fa-file-audio"></i>';
        case 'mp4':
        case 'avi':
        case 'mov':
            return '<i class="fas fa-file-video"></i>';
        case 'zip':
        case 'rar':
        case 'tar':
        case 'gz':
            return '<i class="fas fa-file-archive"></i>';
        case 'php':
            return '<i class="fas fa-file-code"></i>';
        case 'html':
        case 'css':
        case 'js':
            return '<i class="fas fa-file-code"></i>';
        case 'txt':
            return '<i class="fas fa-file-alt"></i>';
        default:
            return '<i class="fas fa-file"></i>';
    }
}

$pathParts = $path ? explode('/', $path) : [];
$breadcrumb = '<a href="?path="><i class="fas fa-home"></i> Home</a>';
$currentPathBuilder = '';

foreach ($pathParts as $part) {
    $currentPathBuilder .= '/' . $part;
    $currentPathBuilder = ltrim($currentPathBuilder, '/');
    $breadcrumb .= ' / <a href="?path=' . urlencode($currentPathBuilder) . '">' . htmlspecialchars($part) . '</a>';
}

function sortUrl($sortField) {
    global $sort, $order, $path;
    $newOrder = ($sort === $sortField && $order === 'asc') ? 'desc' : 'asc';
    return '?path=' . urlencode($path) . '&sort=' . $sortField . '&order=' . $newOrder;
}

function sortIndicator($sortField) {
    global $sort, $order;
    if ($sort !== $sortField) {
        return '';
    }
    return $order === 'asc' ? '<i class="fas fa-sort-up"></i>' : '<i class="fas fa-sort-down"></i>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>📁 File Browser</title>
    <style>
        :root {
            --primary: #4a6fa5;
            --secondary: #6c757d;
            --light: #f8f9fa;
            --dark: #343a40;
            --success: #28a745;
            --hover: #e9ecef;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--dark);
            background-color: var(--light);
            padding: 0;
            margin: 0;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        header {
            background-color: var(--primary);
            color: white;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        header h1 {
            margin: 0;
            font-size: 24px;
        }
        
        .breadcrumb {
            background-color: white;
            padding: 10px 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        
        .breadcrumb a {
            color: var(--primary);
            text-decoration: none;
        }
        
        .breadcrumb a:hover {
            text-decoration: underline;
        }
        
        .file-list {
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            overflow: hidden;
        }
        
        .file-list-header {
            background-color: #f1f3f5;
            padding: 12px 15px;
            border-bottom: 1px solid #dee2e6;
            display: grid;
            grid-template-columns: auto 1fr auto auto;
            gap: 10px;
            font-weight: bold;
        }
        
        .file-list-header a {
            color: var(--dark);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .file-list-header a:hover {
            color: var(--primary);
        }
        
        .file-list-item {
            display: grid;
            grid-template-columns: auto 1fr auto auto;
            gap: 10px;
            padding: 12px 15px;
            border-bottom: 1px solid #dee2e6;
            align-items: center;
        }
        
        .file-list-item:last-child {
            border-bottom: none;
        }
        
        .file-list-item:hover {
            background-color: var(--hover);
        }
        
        .file-list-item a {
            color: var(--dark);
            text-decoration: none;
        }
        
        .file-list-item a:hover {
            color: var(--primary);
        }
        
        .file-icon {
            color: var(--primary);
            width: 24px;
            text-align: center;
            margin-right: 10px;
        }
        
        .file-icon.folder {
            color: #ffc107;
        }
        
        .file-size, .file-date {
            color: var(--secondary);
            font-size: 0.9em;
        }
        
        .back-button {
            display: inline-block;
            margin-bottom: 20px;
            background-color: var(--primary);
            color: white;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.2s;
        }
        
        .back-button:hover {
            background-color: #3a5a8a;
            text-decoration: none;
        }
        
        .empty-message {
            text-align: center;
            padding: 30px;
            color: var(--secondary);
        }
        
        @media (max-width: 768px) {
            .file-list-item, .file-list-header {
                grid-template-columns: auto 1fr auto;
            }
            
            .file-date {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1><i class="fas fa-folder-open"></i> File Browser</h1>
        </header>
        
        <div class="breadcrumb">
            <?= $breadcrumb ?>
        </div>
        
        <?php if ($path): ?>
            <a href="?path=<?= urlencode(dirname($path)) ?>" class="back-button">
                <i class="fas fa-arrow-left"></i> Back
            </a>
        <?php endif; ?>
        
        <div class="file-list">
            <div class="file-list-header">
                <span></span>
                <a href="<?= sortUrl('name') ?>">Name <?= sortIndicator('name') ?></a>
                <a href="<?= sortUrl('size') ?>">Size <?= sortIndicator('size') ?></a>
                <a href="<?= sortUrl('modified') ?>">Modified <?= sortIndicator('modified') ?></a>
            </div>
            
            <?php if (empty($itemsData)): ?>
                <div class="empty-message">
                    <i class="fas fa-folder-open"></i> This folder is empty
                </div>
            <?php else: ?>
                <?php foreach ($itemsData as $item): ?>
                    <?php
                        $itemPath = trim($path . '/' . $item['name'], '/');
                        $fullPath = $currentDir . '/' . $item['name'];
                        $isViewable = in_array(strtolower($item['type']), ['php', 'html', 'txt', 'css', 'js', 'json', 'md']);
                    ?>
                    <div class="file-list-item">
                        <div class="file-icon <?= $item['isDir'] ? 'folder' : '' ?>">
                            <?= getFileIcon($item) ?>
                        </div>
                        
                        <?php if ($item['isDir']): ?>
                            <a href="?path=<?= urlencode($itemPath) ?>&sort=<?= $sort ?>&order=<?= $order ?>">
                                <?= htmlspecialchars($item['name']) ?>
                            </a>
                        <?php elseif ($isViewable): ?>
                            <a href="<?= htmlspecialchars($itemPath) ?>" target="_blank">
                                <?= htmlspecialchars($item['name']) ?>
                            </a>
                        <?php else: ?>
                            <span><?= htmlspecialchars($item['name']) ?></span>
                        <?php endif; ?>
                        
                        <div class="file-size">
                            <?= $item['isDir'] ? '--' : formatFileSize($item['size']) ?>
                        </div>
                        
                        <div class="file-date">
                            <?= date('Y-m-d H:i', $item['modified']) ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>