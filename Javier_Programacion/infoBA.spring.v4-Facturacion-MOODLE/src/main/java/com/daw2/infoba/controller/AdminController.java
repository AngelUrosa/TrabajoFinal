package com.daw2.infoba.controller;

import com.daw2.infoba.model.entity.Proveedor;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;

@Controller
@RequestMapping("/admin")
public class AdminController {

    @GetMapping
    public String home() {
        return "admin/index";
    }
}
