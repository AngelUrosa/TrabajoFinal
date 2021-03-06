package com.daw2.infoba.configuration;

import org.springframework.beans.factory.annotation.Value;
import org.springframework.context.annotation.Configuration;
import org.springframework.web.servlet.config.annotation.ResourceHandlerRegistry;
import org.springframework.web.servlet.config.annotation.WebMvcConfigurer;

import java.nio.file.Paths;

@Configuration
public class MvcConfig implements WebMvcConfigurer {
    @Value("${resources.upload}")
    private String pathUpload;
    @Value("${resources.upload.articulos}")
    private String pathArticulosImages;
    @Override
    public void addResourceHandlers(ResourceHandlerRegistry registry) {
        registry.
                addResourceHandler("/upload/**"). // con esto indicamos el directorio virtual
                addResourceLocations(Paths.get(pathUpload).toAbsolutePath().toUri().toString()); // con esto indicamos el directorio real
        registry.
                addResourceHandler("/articulosImages/**"). // con esto indicamos el directorio virtual
                addResourceLocations(Paths.get(pathArticulosImages).toAbsolutePath().toUri().toString()); // con esto indicamos el directorio real
    }
}