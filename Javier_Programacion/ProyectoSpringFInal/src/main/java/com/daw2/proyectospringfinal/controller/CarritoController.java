package com.daw2.proyectospringfinal.controller;


import com.daw2.proyectospringfinal.components.FacturaComponent;
import com.daw2.proyectospringfinal.model.entity.*;
import com.daw2.proyectospringfinal.service.*;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.core.context.SecurityContextHolder;
import org.springframework.security.core.userdetails.UserDetails;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.servlet.mvc.support.RedirectAttributes;

import javax.servlet.http.HttpServletRequest;
import javax.validation.Valid;
import java.util.ArrayList;
import java.util.List;

@Controller
@RequestMapping("/carrito")
public class CarritoController {


    @Autowired
    private ArticulosService articulosService;

    @Autowired
    private UsuariosService usuariosService;

    @Autowired
    private UsuariosArticulosService usuariosArticulosService;



    @GetMapping({"/list"})
    public String listCarrito(@ModelAttribute("articuloCarrito") Articulo articulo, RedirectAttributes attributes ,Model model) {

        Usuario usuario = usuariosService.findByUsername(SecurityContextHolder.getContext().getAuthentication().getName());

        List<ArticulosUsuarios> carrito = usuariosArticulosService.getAllByUsuario(usuario);

        model.addAttribute("carrito", carrito);

        return "cliente/carrito/list";
    }

    @PostMapping("/add")
    public String addCarrito(@RequestParam String ref){

        Usuario usuario = usuariosService.findByUsername(SecurityContextHolder.getContext().getAuthentication().getName());

        Articulo articulo= articulosService.getByRef(ref);

        usuariosArticulosService.add(usuario,articulo);

        return "redirect:/";

    }

}


