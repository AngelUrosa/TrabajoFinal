/*
package com.daw2.proyectospringfinal.controller;

import com.daw2.proyectospringfinal.model.entity.Usuario;
import com.daw2.proyectospringfinal.service.ArticulosService;
import com.daw2.proyectospringfinal.service.UsuariosService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.servlet.mvc.support.RedirectAttributes;

import javax.validation.Valid;
import java.util.List;

@Controller
@RequestMapping("/admin/usuarios")
public class AdminUsuariosController {
    @Autowired
    private UsuariosService usuariosService;
    @Autowired
    private ArticulosService articulosService;

    @GetMapping("/add")
    public String add(@RequestParam(required = false) String nif, Model model) {
        if (nif != null) {
            Usuario usuario = usuariosService.getByNif(nif);
            if (usuario != null) {
                model.addAttribute("readonly", true);
                model.addAttribute("showSubmit", false);
                model.addAttribute("usuario", usuario);
                model.addAttribute("alertDanger", "El usuario ya está dado de alta");
            } else {
                model.addAttribute("readonly", false);
                model.addAttribute("showSubmit", true);
                usuario= new Usuario();
                usuario.setNif(nif);
                model.addAttribute("usuario", usuario);
            }
        } else {
            model.addAttribute("readonly", true);
            model.addAttribute("usuario", new Usuario());
        }
         model.addAttribute("usuarios", usuariosService.listLastRows(10));
        return "admin/usuarios/add";
    }

    @PostMapping("/add")
    public String add(@Valid Usuario usuario, BindingResult result, RedirectAttributes flash, Model model) {
        if (result.hasErrors()) {
            model.addAttribute("showSubmit", true);
            return "admin/usuarios/add";
        }
        try {
            usuariosService.save(usuario);
            flash.addFlashAttribute("readonly", true);
            flash.addFlashAttribute("showSubmit", false);
            flash.addFlashAttribute("alertSuccess", "Usuario guardado");
        } catch (Exception ex) {
            flash.addFlashAttribute("readonly", false);
            flash.addFlashAttribute("showSubmit", true);
            flash.addFlashAttribute("alertDanger", "Usuario NO guardado");
            flash.addFlashAttribute("usuario", usuario);
        }
        return "redirect:/admin/usuarios/add";
    }

    @GetMapping("/show/{nif}")
    public String show(@PathVariable String nif, Model model) {
        Usuario usuario = usuariosService.getByNif(nif);
        if (usuario != null) {
            model.addAttribute("usuario", usuario);
//            model.addAttribute("facturas", articulosService.listByCliente(cliente.getId()));
        } else {
            model.addAttribute("usuario", new Usuario());
            model.addAttribute("alertWarning", "Usuario no encontrado");
        }

        return "admin/usuarios/show";
    }


    @GetMapping("/delete/{nif}")
    public String delete(@PathVariable String nif, Model model) {

        Usuario usuario = usuariosService.getByNif(nif);
        if (usuario != null) {
            model.addAttribute("showSubmit", true);
            model.addAttribute("usuario", usuario);
//            model.addAttribute("facturas", articulosService.listByCliente(cliente.getId()));
        } else {
            model.addAttribute("showSubmit", false);
            model.addAttribute("usuario", new Usuario());
            model.addAttribute("alertDanger", "Usuario NO encontrado");
        }

        return "admin/usuarios/delete";
    }

    @PostMapping("/delete")
    public String delete(Usuario usuario, RedirectAttributes flash) {
        try {
            usuariosService.delete(usuario.getId());
            flash.addFlashAttribute("alertSuccess", "Usuario borrado");
            flash.addFlashAttribute("usuario", new Usuario());
            flash.addFlashAttribute("showSubmit", false);
        } catch (Exception ex) {
            flash.addFlashAttribute("alertDanger", "Usuario NO borrado");
            flash.addFlashAttribute("usuario", usuario);
            flash.addFlashAttribute("showSubmit", true);
        }
        flash.addFlashAttribute("readonly", true);
        return "redirect:/admin/usuarios/list";
    }

    @GetMapping("/update/{nif}")
    public String update(@PathVariable String nif, Model model) {
        Usuario usuario = usuariosService.getByNif(nif);
        if (usuario != null) {
            model.addAttribute("showSubmit", true);
            model.addAttribute("usuario", usuario);
            model.addAttribute("readonly", false);
//            model.addAttribute("facturas", articulosService.listByCliente(cliente.getId()));
        } else {
            model.addAttribute("showSubmit", false);
            model.addAttribute("usuario", new Usuario());
            model.addAttribute("alertDanger", "usuario NO encontrado");
            model.addAttribute("readonly", true);
        }

        return "admin/usuarios/update";
    }

    @PostMapping("/update")
    public String update(Usuario usuario, RedirectAttributes flash) {
        try {
            usuariosService.save(usuario);
            flash.addFlashAttribute("alertSuccess", "usuario actualizado");
            flash.addFlashAttribute("usuario", new Usuario());
            flash.addFlashAttribute("showSubmit", false);
        } catch (Exception ex) {
            flash.addFlashAttribute("alertDanger", "usuario NO actualizado");
            flash.addFlashAttribute("usuario", usuario);
            flash.addFlashAttribute("showSubmit", true);
        }
        flash.addFlashAttribute("readonly", true);
        return "redirect:/admin/usuarios/update/"+usuario.getNif();
    }

    @GetMapping({"","/list"})
    public String list(Model model) {
        if (model.getAttribute("usuarios")==null)
            model.addAttribute("usuarios", usuariosService.listAll()); // Hay que paginar
        return "admin/usuarios/list";
    }
    */
/*String razonSocial*//*

    @PostMapping({"","/list"})
    public String list(@RequestParam(required = false) String nif, RedirectAttributes flash, Model model) {
        List<Usuario> usuarios = null;
        if (nif != null && !nif.isEmpty())
            usuarios = usuariosService.listByNif(nif);
*/
/*        else if (nombre != null && !nombre.isEmpty())
            usuarios = usuariosService.listByRazonSocial(razonSocial);*//*

        flash.addFlashAttribute("nif", nif);
       */
/* flash.addFlashAttribute("descripcion", razonSocial);*//*

        flash.addFlashAttribute("usuarios", usuarios);
        return "redirect:/admin/usuarios/list";
    }

}
*/
