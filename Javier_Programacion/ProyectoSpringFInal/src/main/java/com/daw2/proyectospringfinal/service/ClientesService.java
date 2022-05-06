package com.daw2.proyectospringfinal.service;

import com.daw2.proyectospringfinal.model.entity.Cliente;

import java.util.List;

public interface ClientesService {
    Cliente save(Cliente cliente);
    List<Cliente> listAll();
    Cliente getByNif(String nif);
    List<Cliente> listLastRows(int rows);
    void delete(int id);
    List<Cliente> listByRazonSocial(String razonSocial);
    List<Cliente> listByNif(String nif);
}
