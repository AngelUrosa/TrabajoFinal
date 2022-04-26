package com.daw2.infoba.controller;

import com.daw2.infoba.service.ArticulosService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;

@Controller
@RequestMapping("/")
public class HomeController {
    @Autowired
    private ArticulosService articulosService;
    @GetMapping
    public String home(Model model) {
        model.addAttribute("articulos",articulosService.listAll());
        return "index";
    }
}
