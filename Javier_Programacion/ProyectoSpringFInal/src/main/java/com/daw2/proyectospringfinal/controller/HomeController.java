package com.daw2.proyectospringfinal.controller;

import com.daw2.proyectospringfinal.model.entity.Articulo;
import com.daw2.proyectospringfinal.service.ArticulosService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.servlet.mvc.support.RedirectAttributes;

import java.security.Principal;
import java.util.ArrayList;
import java.util.List;

@Controller
@RequestMapping("/")
public class HomeController {
    @Autowired
    private ArticulosService articulosService;

    @GetMapping
    public String home(Model model) {



        model.addAttribute("articulos", articulosService.listAll());

        return "index";
    }


    @GetMapping("/masVendidos")
    public String masVendidos(Model model) {



        model.addAttribute("articulos", articulosService.top3());

        return "masVendidos";
    }


    @PostMapping("/add")
    public String addCarrito(Articulo articulo, RedirectAttributes attributes) {



        articulo.setCarrito(true);

        return "index";

    }

    @GetMapping("login")
    public String login() {
        return "login";
    }


    @PostMapping("login")
    public String login(@RequestParam(value ="error",required = false) String error,
                        @RequestParam(value ="logout",required = false) String logout,
                        Model model, Principal principal, RedirectAttributes flash) {
        if (principal!=null) {
            flash.addFlashAttribute("alertInfo","Tiene una sesion iniciada.");
            return "redirect:/";
        }
        if (error !=null) {
            model.addAttribute("alertError","Identificación incorrecta.");
        }
        if (logout !=null) {
            model.addAttribute("alertSuccess","Ha finalizado la sesión.");
        }

        return "login";
    }

    @PostMapping("carrito/add/{ref}")
    public String addCarrito(){

        return "/cliente/carrito/list.html";

    }

}