package com.daw2.proyectospringfinal.service.impl;

import com.daw2.proyectospringfinal.model.entity.Proveedor;
import com.daw2.proyectospringfinal.model.repository.ProveedoresRepository;
import com.daw2.proyectospringfinal.service.ProveedoresService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.PageRequest;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class ProveedoresServiceImpl implements ProveedoresService {
    @Autowired
    private ProveedoresRepository proveedoresRepository;

   @Override
   public Proveedor save(Proveedor proveedor){
       return proveedoresRepository.save(proveedor);
   }

    @Override
    public List<Proveedor> listAll() {
        return proveedoresRepository.findAll();
    }

    @Override
    public Proveedor getByNif(String nif) {
        return proveedoresRepository.getByNif(nif);
    }

    @Override
    public List<Proveedor> listLastRows(int rows) {
        return proveedoresRepository.findLastRows(PageRequest.of(0, rows));
    }

    @Override
    public void delete(int id) {
        proveedoresRepository.deleteById(id);
    }

    @Override
    public List<Proveedor> listByRazonSocial(String razonSocial) {
        return proveedoresRepository.findByRazonSocialContainingIgnoreCase(razonSocial);
    }

    @Override
    public List<Proveedor> listByNif(String nif) {
        return proveedoresRepository.findByNif(nif);
    }


}
