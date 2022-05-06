package com.daw2.proyectospringfinal.controller;

import com.daw2.proyectospringfinal.model.entity.Cliente;
import com.daw2.proyectospringfinal.service.ArticulosService;
import com.daw2.proyectospringfinal.service.ClientesService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.servlet.mvc.support.RedirectAttributes;

import javax.validation.Valid;
import java.util.List;

@Controller
@RequestMapping("/admin/clientes")
public class AdminClientesController {
    @Autowired
    private ClientesService clientesService;
    @Autowired
    private ArticulosService articulosService;

    @GetMapping("/add")
    public String add(@RequestParam(required = false) String nif, Model model) {
        if (nif != null) {
            Cliente cliente = clientesService.getByNif(nif);
            if (cliente != null) {
                model.addAttribute("readonly", true);
                model.addAttribute("showSubmit", false);
                model.addAttribute("cliente", cliente);
                model.addAttribute("alertDanger", "El cliente ya está dado de alta");
            } else {
                model.addAttribute("readonly", false);
                model.addAttribute("showSubmit", true);
                cliente = new Cliente();
                cliente.setNif(nif);
                model.addAttribute("cliente", cliente);
            }
        } else {
            model.addAttribute("readonly", true);
            model.addAttribute("cliente", new Cliente());
        }
        model.addAttribute("clientes", clientesService.listLastRows(10));
        return "admin/clientes/add";
    }

    @PostMapping("/add")
    public String add(@Valid Cliente cliente, BindingResult result, RedirectAttributes flash, Model model) {
        if (result.hasErrors()) {
            model.addAttribute("showSubmit", true);
            return "admin/clientes/add";
        }
        try {
            clientesService.save(cliente);
            flash.addFlashAttribute("readonly", true);
            flash.addFlashAttribute("showSubmit", false);
            flash.addFlashAttribute("alertSuccess", "Cliente guardado");
        } catch (Exception ex) {
            flash.addFlashAttribute("readonly", false);
            flash.addFlashAttribute("showSubmit", true);
            flash.addFlashAttribute("alertDanger", "Cliente NO guardado");
            flash.addFlashAttribute("cliente", cliente);
        }
        return "redirect:/admin/clientes/add";
    }

    @GetMapping("/show/{nif}")
    public String show(@PathVariable String nif, Model model) {
        Cliente cliente = clientesService.getByNif(nif);
        if (cliente != null) {
            model.addAttribute("cliente", cliente);
//            model.addAttribute("facturas", articulosService.listByCliente(cliente.getId()));
        } else {
            model.addAttribute("cliente", new Cliente());
            model.addAttribute("alertWarning", "Cliente no encontrado");
        }

        return "admin/clientes/show";
    }


    @GetMapping("/delete/{nif}")
    public String delete(@PathVariable String nif, Model model) {

        Cliente cliente = clientesService.getByNif(nif);
        if (cliente != null) {
            model.addAttribute("showSubmit", true);
            model.addAttribute("cliente", cliente);
//            model.addAttribute("facturas", articulosService.listByCliente(cliente.getId()));
        } else {
            model.addAttribute("showSubmit", false);
            model.addAttribute("cliente", new Cliente());
            model.addAttribute("alertDanger", "Cliente NO encontrado");
        }

        return "admin/clientes/delete";
    }

    @PostMapping("/delete")
    public String delete(Cliente cliente, RedirectAttributes flash) {
        try {
            clientesService.delete(cliente.getId());
            flash.addFlashAttribute("alertSuccess", "Cliente borrado");
            flash.addFlashAttribute("cliente", new Cliente());
            flash.addFlashAttribute("showSubmit", false);
        } catch (Exception ex) {
            flash.addFlashAttribute("alertDanger", "Cliente NO borrado");
            flash.addFlashAttribute("cliente", cliente);
            flash.addFlashAttribute("showSubmit", true);
        }
        flash.addFlashAttribute("readonly", true);
        return "redirect:/admin/clientes";
    }

    @GetMapping("/update/{nif}")
    public String update(@PathVariable String nif, Model model) {
        Cliente cliente = clientesService.getByNif(nif);
        if (cliente != null) {
            model.addAttribute("showSubmit", true);
            model.addAttribute("cliente", cliente);
            model.addAttribute("readonly", false);
//            model.addAttribute("facturas", articulosService.listByCliente(cliente.getId()));
        } else {
            model.addAttribute("showSubmit", false);
            model.addAttribute("cliente", new Cliente());
            model.addAttribute("alertDanger", "Cliente NO encontrado");
            model.addAttribute("readonly", true);
        }

        return "admin/clientes/update";
    }

    @PostMapping("/update")
    public String update(@Valid Cliente cliente, BindingResult result, RedirectAttributes flash, Model model) {
        if (result.hasErrors()) {
            model.addAttribute("showSubmit", true);
            return "admin/clientes/add";
        }
        try {
            clientesService.save(cliente);
            flash.addFlashAttribute("alertSuccess", "Cliente actualizado");
            flash.addFlashAttribute("cliente", new Cliente());
            flash.addFlashAttribute("showSubmit", false);
        } catch (Exception ex) {
            flash.addFlashAttribute("alertDanger", "Cliente NO actualizado");
            flash.addFlashAttribute("cliente", cliente);
            flash.addFlashAttribute("showSubmit", true);
        }
        flash.addFlashAttribute("readonly", true);
        return "redirect:/admin/clientes/update/" + cliente.getNif();
    }

    @GetMapping({"","/list"})
    public String list(Model model) {
        if (model.getAttribute("clientes") == null)
            model.addAttribute("clientes", clientesService.listAll()); // Hay que paginar
        return "admin/clientes/list";
    }

    @PostMapping({"","/list"})
    public String list(@RequestParam(required = false) String nif, @RequestParam(required = false) String razonSocial, RedirectAttributes flash, Model model) {
        List<Cliente> clientes = null;
        if (nif != null && !nif.isEmpty())
            clientes = clientesService.listByNif(nif);
        else if (razonSocial != null && !razonSocial.isEmpty())
            clientes = clientesService.listByRazonSocial(razonSocial);
        flash.addFlashAttribute("referencia", nif);
        flash.addFlashAttribute("descripcion", razonSocial);
        flash.addFlashAttribute("clientes", clientes);
        return "redirect:/admin/clientes";
    }

}
