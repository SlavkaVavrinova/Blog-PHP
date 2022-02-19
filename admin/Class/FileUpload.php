<?php

class FileUpload
{
  private string $inputName;

  private string $uploadDir;

  private bool $isImage;

  public function __construct(string $inputName, string $uploadDir, bool $isImage = false)
  {
    $this->inputName = $inputName;
    $this->uploadDir = $uploadDir;
    $this->isImage = $isImage;
  }

  public function processUpload(): ?array
  {
    $file = $_FILES[$this->inputName] ?? null;
    if (!$file) {
      return null;
    }
    $fileTmpPath = $file['tmp_name'];
    $fileName = $file['name'];
    $fileSize = $file['size'];
    $fileType = $file['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    // sanitize file-name
    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
    if ($this->isImage) {
      if (!getimagesize($fileTmpPath)) {
        return null;
      }
    }
    $newFileNameWithPath = $this->uploadDir . $newFileName;
    if (!is_dir($this->uploadDir)) {
      mkdir($this->uploadDir);
    }
    if (move_uploaded_file($fileTmpPath, $newFileNameWithPath)) {
      return ["fileName" => $newFileName, "fullPath" => $newFileNameWithPath];
    }

    return null;
  }
}
