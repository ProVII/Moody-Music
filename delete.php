<?php
foreach (glob('music/*') as $file) {
    if (basename($file) == 'file'.$_GET['fileID'].'webm')
        unlink($file);
    else if (basename($file) != '.gitignore.txt')
        unlink($file);
    // empties music folder after each use
}
?>