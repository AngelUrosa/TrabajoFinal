/*
package com.daw2.proyectospringfinal.controller;

import com.daw2.proyectospringfinal.model.entity.Proveedor;
import com.daw2.proyectospringfinal.service.ArticulosService;
import com.daw2.proyectospringfinal.service.ProveedoresService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.servlet.mvc.support.RedirectAttributes;

import javax.validation.Valid;
import java.util.List;

@Controller
@RequestMapping("/admin/proveedores")
public class AdminProveedoresController {
    @Autowired
    private ProveedoresService proveedoresService;
    @Autowired
    private ArticulosService articulosService;

    @GetMapping("/add")
    public String add(@RequestParam(required = false) String nif, Model model) {
        if (nif != null) {
            Proveedor proveedor = proveedoresService.getByNif(nif);
            if (proveedor != null) {
                model.addAttribute("readonly", true);
                model.addAttribute("showSubmit", false);
                model.addAttribute("proveedor", proveedor);
                model.addAttribute("alertDanger", "El proveedor ya está dado de alta");
            } else {
                model.addAttribute("readonly", false);
                model.addAttribute("showSubmit", true);
                proveedor= new Proveedor();
                proveedor.setNif(nif);
                model.addAttribute("proveedor", proveedor);
            }
        } else {
            model.addAttribute("readonly", true);
            model.addAttribute("proveedor", new Proveedor());
        }
         model.addAttribute("proveedores", proveedoresService.listLastRows(10));
        return "admin/proveedores/add";
    }

    @PostMapping("/add")
    public String add(@Valid Proveedor proveedor, BindingResult result, RedirectAttributes flash, Model model) {
        if (result.hasErrors()) {
            model.addAttribute("showSubmit", true);
            return "admin/proveedores/add";
        }
        try {
            proveedoresService.save(proveedor);
            flash.addFlashAttribute("readonly", true);
            flash.addFlashAttribute("showSubmit", false);
            flash.addFlashAttribute("alertSuccess", "Proveedor guardado");
        } catch (Exception ex) {
            flash.addFlashAttribute("readonly", false);
            flash.addFlashAttribute("showSubmit", true);
            flash.addFlashAttribute("alertDanger", "Proveedor NO guardado");
            flash.addFlashAttribute("proveedor", proveedor);
        }
        return "redirect:/admin/proveedores/add";
    }

    @GetMapping("/show/{nif}")
    public String show(@PathVariable String nif, Model model) {
        Proveedor proveedor = proveedoresService.getByNif(nif);
        if (proveedor != null) {
            model.addAttribute("proveedor", proveedor);
            model.addAttribute("articulos", articulosService.listByProveedor(proveedor.getId()));
        } else {
            model.addAttribute("proveedor", new Proveedor());
            model.addAttribute("alertWarning", "Proveedor no encontrado");
        }

        return "admin/proveedores/show";
    }


    @GetMapping("/delete/{nif}")
    public String delete(@PathVariable String nif, Model model) {

        Proveedor proveedor = proveedoresService.getByNif(nif);
        if (proveedor != null) {
            model.addAttribute("showSubmit", true);
            model.addAttribute("proveedor", proveedor);
            model.addAttribute("articulos", articulosService.listByProveedor(proveedor.getId()));
        } else {
            model.addAttribute("showSubmit", false);
            model.addAttribute("proveedor", new Proveedor());
            model.addAttribute("alertDanger", "Proveedor NO encontrado");
        }

        return "admin/proveedores/delete";
    }

    @PostMapping("/delete")
    public String delete(Proveedor proveedor, RedirectAttributes flash) {
        try {
            proveedoresService.delete(proveedor.getId());
            flash.addFlashAttribute("alertSuccess", "Proveedor borrado");
            flash.addFlashAttribute("proveedor", new Proveedor());
            flash.addFlashAttribute("showSubmit", false);
        } catch (Exception ex) {
            flash.addFlashAttribute("alertDanger", "Proveedor NO borrado");
            flash.addFlashAttribute("proveedor", proveedor);
            flash.addFlashAttribute("showSubmit", true);
        }
        flash.addFlashAttribute("readonly", true);
        return "redirect:/admin/proveedores/list";
    }

    @GetMapping("/update/{nif}")
    public String update(@PathVariable String nif, Model model) {
        Proveedor proveedor = proveedoresService.getByNif(nif);
        if (proveedor != null) {
            model.addAttribute("showSubmit", true);
            model.addAttribute("proveedor", proveedor);
            model.addAttribute("readonly", false);
            model.addAttribute("articulos", articulosService.listByProveedor(proveedor.getId()));
        } else {
            model.addAttribute("showSubmit", false);
            model.addAttribute("proveedor", new Proveedor());
            model.addAttribute("alertDanger", "Proveedor NO encontrado");
            model.addAttribute("readonly", true);
        }

        return "admin/proveedores/update";
    }

    @PostMapping("/update")
    public String update(Proveedor proveedor, RedirectAttributes flash) {
        try {
            proveedoresService.save(proveedor);
            flash.addFlashAttribute("alertSuccess", "Proveedor actualizado");
            flash.addFlashAttribute("proveedor", new Proveedor());
            flash.addFlashAttribute("showSubmit", false);
        } catch (Exception ex) {
            flash.addFlashAttribute("alertDanger", "Proveedor NO actualizado");
            flash.addFlashAttribute("proveedor", proveedor);
            flash.addFlashAttribute("showSubmit", true);
        }
        flash.addFlashAttribute("readonly", true);
        return "redirect:/admin/proveedores/update/"+proveedor.getNif();
    }

    @GetMapping({"","/list"})
    public String list(Model model) {
        if (model.getAttribute("proveedores")==null)
            model.addAttribute("proveedores", proveedoresService.listAll()); // Hay que paginar
        return "admin/proveedores/list";
    }

    @PostMapping({"","/list"})
    public String list(@RequestParam(required = false) String nif,
                       @RequestParam(required = false) String razonSocial, RedirectAttributes flash, Model model) {
        List<Proveedor> proveedores = null;
        if (nif != null && !nif.isEmpty()) {
            proveedores = proveedoresService.listByNif(nif);
        } else if (razonSocial != null && !razonSocial.isEmpty())
            proveedores = proveedoresService.listByRazonSocial(razonSocial);
        flash.addFlashAttribute("referencia", nif);
        flash.addFlashAttribute("descripcion", razonSocial);
        flash.addFlashAttribute("proveedores", proveedores);
        return "redirect:/admin/proveedores/list";
    }

}
*/
