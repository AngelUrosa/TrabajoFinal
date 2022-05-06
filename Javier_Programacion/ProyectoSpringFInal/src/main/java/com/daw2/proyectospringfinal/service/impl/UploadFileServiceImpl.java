package com.daw2.proyectospringfinal.service.impl;
import java.io.File;
import java.io.IOException;
import java.net.MalformedURLException;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.Paths;
import java.util.UUID;

import com.daw2.proyectospringfinal.service.UploadFileService;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Value;
import org.springframework.core.io.Resource;
import org.springframework.core.io.UrlResource;
import org.springframework.stereotype.Service;
import org.springframework.util.FileSystemUtils;
import org.springframework.web.multipart.MultipartFile;

import javax.annotation.PostConstruct;

@Service
public class UploadFileServiceImpl implements UploadFileService {

    private final Logger log = LoggerFactory.getLogger(getClass());

    @Value("${resources.upload}")
    private String uploadsFolder;
    @Value("${resources.upload.articulos}")
    private String uploadsArticulos;

    @PostConstruct
    public void init() throws IOException {
        if (!Files.isDirectory(Paths.get(uploadsFolder))) {
                Files.createDirectory(Paths.get(uploadsFolder));
        }
        if (!Files.isDirectory(Paths.get(uploadsArticulos))) {
            Files.createDirectory(Paths.get(uploadsArticulos));
        }
    }

    @Override
    public String getFilenameSource(String filename) {
        return filename.substring(filename.indexOf("_")+1);
    }

    @Override
    public Resource load(DestinoUpload destinoUpload, String filename) throws MalformedURLException {
        Path pathFoto = getPath(destinoUpload, filename);
        log.info("pathFoto: " + pathFoto);

        Resource recurso = new UrlResource(pathFoto.toUri());

        if (!recurso.exists() || !recurso.isReadable()) {
            throw new RuntimeException("Error: no se puede cargar la imagen: " + pathFoto.toString());
        }
        return recurso;
    }

    @Override
    public String copy(DestinoUpload destinoUpload, MultipartFile file) throws IOException {
        String uniqueFilename = UUID.randomUUID().toString() + "_" + file.getOriginalFilename();
        Path rootPath = getPath(destinoUpload, uniqueFilename);

        log.info("rootPath: " + rootPath);

        Files.copy(file.getInputStream(), rootPath);

        return uniqueFilename;
    }

    @Override
    public boolean delete(DestinoUpload destinoUpload, String filename) {
        Path rootPath = getPath(destinoUpload, filename);
        File archivo = rootPath.toFile();

        if (archivo.exists() && archivo.canRead()) {
            if (archivo.delete()) {
                return true;
            }
        }
        return false;
    }

    public Path getPath(DestinoUpload destinoUpload, String filename) {
        String rutaBase = "";
        switch (destinoUpload) {
            case ARTICULOS: rutaBase = uploadsArticulos; break;
            default: rutaBase = uploadsFolder; break;
        }
        return Paths.get(rutaBase).resolve(filename).toAbsolutePath();
    }

    @Override
    public void deleteAll() {
        FileSystemUtils.deleteRecursively(Paths.get(uploadsFolder).toFile());

    }

}
