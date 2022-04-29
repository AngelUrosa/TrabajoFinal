package com.daw2.infoba.service.impl;

import com.daw2.infoba.model.entity.Rol;
import com.daw2.infoba.model.entity.Usuario;
import com.daw2.infoba.model.repository.UsuariosRepository;
import com.daw2.infoba.service.UsuariosService;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.core.GrantedAuthority;
import org.springframework.security.core.authority.SimpleGrantedAuthority;
import org.springframework.security.core.userdetails.User;
import org.springframework.security.core.userdetails.UserDetails;
import org.springframework.security.core.userdetails.UsernameNotFoundException;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import java.util.ArrayList;
import java.util.List;

@Service
public class UsuariosServiceImpl implements UsuariosService {
    @Autowired
    private UsuariosRepository usuariosRepository;

    private Logger logger = LoggerFactory.getLogger(UsuariosServiceImpl.class);

    @Transactional(readOnly = true)
    @Override
    public UserDetails loadUserByUsername(String username) throws UsernameNotFoundException {
        Usuario usuario = usuariosRepository.findByUsername(username);

        if (usuario==null) {
            logger.error("Error en el login: no existe el usuario '"+username+"'");
            throw new UsernameNotFoundException
                    ("Username '"+username+"' no encontrado");
        }

        List<GrantedAuthority> authorities = new ArrayList<>();
        for (Rol rol : usuario.getRoles()) {
            authorities.add(new SimpleGrantedAuthority(rol.getRol()));
        }

        if (authorities.isEmpty()) {
            logger.error("Error en el login: el usuario '"
                    +username+"' no tiene permisos asignados");
            throw new UsernameNotFoundException
                    ("Error en el login: el usuario '"
                            +username+"' no tiene permisos asignados");
        }

        // Es importante que el campo activo este a true
        return new User(usuario.getUsername(), usuario.getPassword(),
                usuario.isActivo(), true,
                true, true, authorities);
    }
}
