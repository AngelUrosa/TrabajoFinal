package com.daw2.proyectospringfinal.controller;

import com.daw2.proyectospringfinal.model.entity.Articulo;
import com.daw2.proyectospringfinal.model.entity.Pedido;
import com.daw2.proyectospringfinal.service.ArticulosService;
import com.daw2.proyectospringfinal.service.ClientesService;
import com.daw2.proyectospringfinal.service.PedidosService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.servlet.mvc.support.RedirectAttributes;

import javax.validation.Valid;
import java.util.Date;

@Controller
@RequestMapping("/admin/pedidos")
public class PedidosController {
    @Autowired
    private PedidosService pedidosService;
    @Autowired
    private ArticulosService articulosService;
    @Autowired
    private ClientesService clientesService;

    @GetMapping("/add/{ref}")
    public String add(@PathVariable String ref, Model model) {
        Articulo articulo = articulosService.getByRef(ref);

        if (articulo!=null) {
            Pedido pedido = new Pedido();
            pedido.setFechaPedido(new Date());
            pedido.setPrecio(articulo.getPrecio());
            pedido.setUnidades(1);
            pedido.setDto(0);
            pedido.setArticulo(articulo);
            model.addAttribute("pedido", pedido);
            model.addAttribute("clientes", clientesService.listAll());
        } else {
            model.addAttribute("pedido", new Pedido());
            model.addAttribute("alertWarning", "Pedido no encontrado");
        }

        model.addAttribute("showSubmit", true);
        model.addAttribute("pedidos", pedidosService.listAll());
        return "admin/pedidos/add";

    }

    @PostMapping("/add")
    public String add(@Valid Pedido pedido, BindingResult result, RedirectAttributes flash, Model model) {
        if (pedido.getCliente().getId() == null)
            result.rejectValue("cliente", "NotNull", "Debe indicar el cliente");

        if (result.hasErrors()) {
            model.addAttribute("showSubmit", true);
            model.addAttribute("clientes", clientesService.listAll());
            model.addAttribute("pedidos", pedidosService.listAll());
            return "admin/pedidos/add";
        }

        try {
            pedidosService.save(pedido);
            flash.addFlashAttribute("readonly", true);
            flash.addFlashAttribute("showSubmit", false);
            flash.addFlashAttribute("alertSuccess", "Pedido guardado");
        } catch (Exception ex) {
            flash.addFlashAttribute("readonly", false);
            flash.addFlashAttribute("showSubmit", true);
            flash.addFlashAttribute("alertDanger", "Pedido NO guardado");
            flash.addFlashAttribute("pedido", pedido);
        }
        model.addAttribute("pedidos", pedidosService.listAll());
        return "redirect:/admin/pedidos";
    }

        @GetMapping("/delete/{id}")
    public String delete(@PathVariable int id, RedirectAttributes flash) {
        try {
            pedidosService.delete(id);
            flash.addFlashAttribute("alertSuccess", "Pedido borrado");
        } catch(Exception ex) {
            flash.addFlashAttribute("alertDanger", "Pedido NO borrado");
        }
        return "redirect:/admin/pedidos";
    }

    @GetMapping({"","/list"})
    public String list(Model model) {
        model.addAttribute("pedidos",pedidosService.listAll());
        return "admin/pedidos/list";
    }


}
