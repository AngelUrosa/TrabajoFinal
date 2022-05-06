package com.daw2.proyectospringfinal.service.impl;

import com.daw2.proyectospringfinal.model.entity.Cliente;
import com.daw2.proyectospringfinal.model.repository.ClientesRepository;
import com.daw2.proyectospringfinal.service.ClientesService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.PageRequest;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class ClientesServiceImpl implements ClientesService {
    @Autowired
    private ClientesRepository clientesRepository;

   @Override
   public Cliente save(Cliente cliente){
       return clientesRepository.save(cliente);
   }

    @Override
    public List<Cliente> listAll() {
        return clientesRepository.findAll();
    }

    @Override
    public Cliente getByNif(String nif) {
        return clientesRepository.getByNif(nif);
    }

    @Override
    public List<Cliente> listLastRows(int rows) {
        return clientesRepository.findLastRows(PageRequest.of(0, rows));
    }

    @Override
    public void delete(int id) {
        clientesRepository.deleteById(id);
    }

    @Override
    public List<Cliente> listByRazonSocial(String razonSocial) {
        return clientesRepository.findByRazonSocialContainingIgnoreCase(razonSocial);
    }

    @Override
    public List<Cliente> listByNif(String nif) {
        return clientesRepository.findByNif(nif);
    }

}
