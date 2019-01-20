<?php

class FileUploadController extends AppController {
	public function index() {
		$this->set('title', __('File Upload Answer'));

		ini_set('auto_detect_line_endings', true);
		$uploaded = false;
		$errmsg = '';
		if (!empty($this->data['FileUpload']['file'])) {
			$uploaded = true;
			$file = $this->data['FileUpload']['file'];
			if (is_file($file['tmp_name'])) {

				$mime_type = '';
				if(function_exists('finfo_open')){
					$finfo = finfo_open(FILEINFO_MIME_TYPE);
					$mime_type = finfo_file($finfo, $file['tmp_name']);
					finfo_close($finfo);
				}elseif(function_exists('mime_content_type')) {
					$mime_type = mime_content_type($file['tmp_name']);
				}

					$ext = pathinfo($file['name'], PATHINFO_EXTENSION);
				if ($ext == 'csv' && $mime_type === 'text/plain') {
					$handle = fopen($file['tmp_name'], "r");
					$headerSkipped = false;
					while ($data = fgetcsv($handle)) {
						if (!$headerSkipped) {
							$headerSkipped = true;
							continue;
						}
						$row = ['name' => $data[0], 'email' => $data[1]];

						$this->FileUpload->create();
						$this->FileUpload->save($row);
					}
					fclose($handle);
				}
				else{
					$errmsg = "Unsupported file type.<br>You uploaded a file with extension: {$ext}, MIME type: {$mime_type}";
				}
			}
			else{
				$errmsg = 'File upload not found';
			}
		}



		$file_uploads = $this->FileUpload->find('all');

		$this->set(compact('file_uploads'));
		$this->set('uploaded', $uploaded);
		$this->set('errmsg', $errmsg);
	}
}