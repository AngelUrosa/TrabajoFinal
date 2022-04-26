package com.daw2.proyectospringfinal.service;

import org.springframework.core.io.Resource;
import org.springframework.web.multipart.MultipartFile;
import java.io.IOException;
import java.net.MalformedURLException;

public interface UploadFileService {
	enum DestinoUpload {UPLOAD, ARTICULOS};

	Resource load(DestinoUpload destinoUpload,String filename) throws MalformedURLException;
	String copy(DestinoUpload destinoUpload, MultipartFile file) throws IOException;
	boolean delete(DestinoUpload destinoUpload,String filename);
	void deleteAll();
	void init() throws IOException;
	String getFilenameSource(String filename);
}