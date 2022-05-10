package com.daw2.proyectospringfinal.controller;

import com.daw2.proyectospringfinal.components.FacturaComponent;
import com.daw2.proyectospringfinal.model.entity.Factura;
import com.daw2.proyectospringfinal.service.ArticulosService;
import com.daw2.proyectospringfinal.service.ClientesService;
import com.daw2.proyectospringfinal.service.FacturasService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.servlet.mvc.support.RedirectAttributes;

import javax.validation.Valid;

@Controller
@RequestMapping("/carrito")
public class CarritoController {

    @Autowired
    private FacturasService facturasService;
    @Autowired
    private ClientesService clientesService;
    @Autowired
    private ArticulosService articulosService;
    @Autowired
    private FacturaComponent facturaComponent;

    @GetMapping("/add")
    public String add(@RequestParam(required = false) String numFactura, Model model) {
        model.addAttribute("showSubmit", true);
        model.addAttribute("factura", facturaComponent.getFactura());
        model.addAttribute("articulos", articulosService.listAll());
        model.addAttribute("clientes", clientesService.listAll());

        return "admin/facturas/add";
    }

    @PostMapping("/add")
    public String add(@Valid Factura factura, BindingResult result,
                      String btSubmit, String btCancel, String btAddArticulo, String btDeleteArticulo,
                      Integer detalleEditado,
                      RedirectAttributes flash, Model model) {
        if (factura.getCliente().getId() == null)
            result.rejectValue("cliente", "NotNull", "debe indicar el cliente");

        if (result.hasErrors()) {
            model.addAttribute("showSubmit", true);
            // model.addAttribute("articulos", articulosService.listAll());
            // model.addAttribute("clientes", clientesService.listAll());
            flash.addFlashAttribute("org.springframework.validation.BindingResult.cliente", result);
            return "admin/facturas/add";
        }
        facturaComponent.setFactura(factura);
        if (btSubmit != null) {
            try {
                facturasService.saveWithDetalle(facturaComponent.getFactura());
                flash.addFlashAttribute("alertSuccess", "Factura nº " + factura.getNumFactura() + " guardada");
                facturaComponent.init();
            } catch (Exception ex) {
                flash.addFlashAttribute("alertDanger", "Factura nº " + factura.getNumFactura() + " NO guardada");
            }
        } else if (btCancel != null) {
            try {
                flash.addFlashAttribute("alertInfo", "Factura nº" + factura.getNumFactura() + " cancelada");
                facturaComponent.init();
            } catch (Exception ex) {
                flash.addFlashAttribute("alertDanger", "Factura nº" + factura.getNumFactura() + " NO guardada");
            }
        } else if (btAddArticulo != null) {
            facturaComponent.addDetalle();
        } else if (btDeleteArticulo != null) {
            facturaComponent.deleteDetalle(Integer.parseInt(btDeleteArticulo));
        } else {  // Submit por change en select Articulo
            facturaComponent.completaDetalle(detalleEditado);
        }

        return "redirect:/admin/facturas/add";
    }

}
