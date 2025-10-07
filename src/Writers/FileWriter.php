<?php
declare(strict_types=1);
namespace PHPFiles\Writers;

class FileWriter {
  protected $fileHandle;
  /**
   * The name of the file. Stored for convenience.
   * @var string
   */
  protected string $fileName;

  /**
   * @param string $fileName The name of the file to write to.
   * @param string $fileExt The file extension (must exclude the dot).
   */
  public function __construct(string $fileName, string $fileExt = "txt", string $mode) {
    // If the file extension passed to the function contains a dot
    if ($fileExt[0] === '.') {
      // Remove the dots from the file extension.
      $fileExt = preg_replace("/\./", "", $fileExt);
    }

    $this->fileName = "$fileName.$fileExt";

    $this->fileHandle = fopen(__DIR__ . "/" . $this->fileName, $mode);
  }

  public function __destruct() {
    fclose($this->fileHandle);
  }
}
