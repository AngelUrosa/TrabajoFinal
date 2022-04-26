/*
package com.daw2.proyectospringfinal.service.impl;

import com.daw2.proyectospringfinal.model.entity.Articulo;
import com.daw2.proyectospringfinal.model.entity.Usuario;
import com.daw2.proyectospringfinal.model.repository.UsuariosRepository;
import com.daw2.proyectospringfinal.service.UsuariosService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.PageRequest;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class UsuariosServiceImpl implements UsuariosService {

    @Autowired
    private UsuariosRepository usuariosRepository;

   @Override
   public Usuario save(Usuario usuario){
       return usuariosRepository.save(usuario);
   }


    @Override
    public Articulo save(Articulo articulo) {
        return null;
    }

    @Override
    public List<Usuario> listAll() {
        return usuariosRepository.findAll();
    }

    @Override
    public Usuario getByNif(String nif) {
        return usuariosRepository.getByNif(nif);
    }

    @Override
    public List<Usuario> listLastRows(int rows) {
        return usuariosRepository.findLastRows(PageRequest.of(0, rows));
    }

    @Override
    public void delete(int id) {
        usuariosRepository.deleteById(id);
    }


    @Override
    public List<Usuario> listByNif(String nif) {
        return usuariosRepository.findByNif(nif);
    }
}
*/
