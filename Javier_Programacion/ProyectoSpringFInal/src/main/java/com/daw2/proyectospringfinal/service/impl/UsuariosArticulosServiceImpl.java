package com.daw2.proyectospringfinal.service.impl;

import com.daw2.proyectospringfinal.model.entity.Articulo;
import com.daw2.proyectospringfinal.model.entity.ArticulosUsuarios;
import com.daw2.proyectospringfinal.model.entity.Usuario;
import com.daw2.proyectospringfinal.model.repository.UsuariosArticulosRepository;
import com.daw2.proyectospringfinal.service.UsuariosArticulosService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import java.util.List;

@Service
public class UsuariosArticulosServiceImpl implements UsuariosArticulosService {

    @Autowired
    UsuariosArticulosRepository usuariosArticulosRepository;

    @Override
    public List<ArticulosUsuarios> getAllByUsuario(Usuario usuario) {

        return usuariosArticulosRepository.getAllByUsuario(usuario);

    }

    @Transactional
    @Override
    public void add(Usuario usuario, Articulo articulo) {

       ArticulosUsuarios articulosUsuarios = usuariosArticulosRepository.getAllByUsuarioAndArticulo(usuario, articulo);

       if (articulosUsuarios == null){
           articulosUsuarios = new ArticulosUsuarios(usuario,articulo,1);
           usuariosArticulosRepository.save(articulosUsuarios);
       }else {
           articulosUsuarios.setCantidad((articulosUsuarios.getCantidad()+1));
       }

    }




}
