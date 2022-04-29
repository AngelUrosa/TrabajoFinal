/*
package com.daw2.proyectospringfinal.controller;

import com.daw2.proyectospringfinal.components.FacturaComponent;
import com.daw2.proyectospringfinal.model.entity.Factura;
import com.daw2.proyectospringfinal.service.ArticulosService;
import com.daw2.proyectospringfinal.service.UsuariosService;
import com.daw2.proyectospringfinal.service.FacturasService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.servlet.mvc.support.RedirectAttributes;

import javax.validation.Valid;
import java.util.List;

@Controller
@RequestMapping("/admin/facturas")
@SessionAttributes("factura")
public class AdminFacturasController {
    @Autowired
    private FacturasService facturasService;
    @Autowired
    private UsuariosService usuariosService;
    @Autowired
    private ArticulosService articulosService;
    @Autowired
    private FacturaComponent facturaComponent;

    @GetMapping("/add")
    public String add(Model model) {
        model.addAttribute("showSubmit", true);
        model.addAttribute("factura", facturaComponent.getFactura());
        return "admin/facturas/add";
    }

    @PostMapping("/add")
    public String add(@Valid Factura factura, BindingResult result,
                      String btSubmit, String btCancel, String btAddArticulo, String btDeleteArticulo,
                      Integer detalleEditado,
                      RedirectAttributes flash, Model model) {

        facturaComponent.setFactura(factura);
        if (btSubmit != null) {
            if (factura.getCliente().getId() == null)
                result.rejectValue("cliente", "NotNull", "debe indicar el cliente");

            if (result.hasErrors()) {
                model.addAttribute("showSubmit", true);
                return "admin/facturas/add";
            }
            try {
                facturasService.saveWithDetalle(facturaComponent.getFactura());
                flash.addFlashAttribute("alertSuccess", "Factura nº " + factura.getNumFactura() + " guardada");
                facturaComponent.init();
            } catch (Exception ex) {
                flash.addFlashAttribute("alertDanger", "Factura nº " + factura.getNumFactura() + " NO guardada");
            }
        } else if (btCancel != null) {
                flash.addFlashAttribute("alertInfo", "Factura nº" + factura.getNumFactura() + " cancelada");
                facturaComponent.init();
        } else if (btAddArticulo != null) {
            facturaComponent.addDetalle();
        } else if (btDeleteArticulo != null) {
            facturaComponent.deleteDetalle(Integer.parseInt(btDeleteArticulo));
        } else {  // Submit por change en select Articulo
            facturaComponent.completaDetalle(detalleEditado);
        }

        return "redirect:/admin/facturas/add";
    }

    @GetMapping("/show/{numFactura}")
    public String show(@PathVariable String numFactura, Model model) {
        Factura factura = facturasService.getByNumFactura(numFactura);
        if (factura != null) {
            model.addAttribute("factura", factura);
        } else {
            facturaComponent.init();
            model.addAttribute("factura", facturaComponent.getFactura());
            model.addAttribute("alertWarning", "Factura nº " + numFactura + " NO encontrada");
        }
        return "admin/facturas/show";
    }

    @GetMapping("/delete/{numFactura}")
    public String delete(@PathVariable String numFactura, Model model) {
        Factura factura = facturasService.getByNumFactura(numFactura);
        if (factura != null) {
            facturaComponent.setFactura(factura);
            model.addAttribute("showSubmit", true);
            model.addAttribute("factura", factura);
        } else {
            model.addAttribute("showSubmit", false);
            facturaComponent.init();
            model.addAttribute("factura", facturaComponent.getFactura());
            model.addAttribute("alertDanger", "Factura nº " + numFactura + " NO encontrada");
        }
        return "admin/facturas/delete";
    }

    @PostMapping("/delete")
    public String delete(Factura factura, RedirectAttributes flash) {
        try {
            facturasService.deleteWithDetalle(factura);
            flash.addFlashAttribute("alertSuccess", "Factura nº " + factura.getNumFactura() + " borrada");
            flash.addFlashAttribute("factura", new Factura());
            flash.addFlashAttribute("showSubmit", false);
        } catch (Exception ex) {
            flash.addFlashAttribute("alertDanger", "Factura nº " + factura.getNumFactura() + " NO borrada");
            flash.addFlashAttribute("factura", factura);
            flash.addFlashAttribute("showSubmit", true);
        }
        flash.addFlashAttribute("readonly", true);
        return "redirect:/admin/facturas";
    }

    @GetMapping("/update/{numFactura}")
    public String update(@PathVariable String numFactura, Model model) {
        Factura factura = facturasService.getByNumFactura(numFactura);
        if (factura != null) {
            facturaComponent.setFactura(factura);
            model.addAttribute("showSubmit", true);
            model.addAttribute("factura", factura);
            model.addAttribute("readonly", false);
        } else {
            facturaComponent.init();
            model.addAttribute("showSubmit", false);
            model.addAttribute("factura", facturaComponent.getFactura());
            model.addAttribute("alertDanger", "Factura nº " + factura.getNumFactura() + " NO encontrado");
            model.addAttribute("readonly", true);
        }
        return "admin/facturas/update";
    }

    @PostMapping("/update")
    public String update(@Valid Factura factura,BindingResult result,
                         String btSubmit, String btCancel, String btAddArticulo, String btDeleteArticulo,
                         Integer detalleEditado,
                         RedirectAttributes flash, Model model) {
        if (factura.getCliente().getId() == null)
            result.rejectValue("cliente", "NotNull", "debe indicar el cliente");

        if (result.hasErrors()) {
            model.addAttribute("showSubmit", true);
            flash.addFlashAttribute("org.springframework.validation.BindingResult.cliente", result);
            return "admin/facturas/add";
        }
        facturaComponent.setFactura(factura);

        if (btSubmit != null) {
            try {
              //  facturasService.deleteDetalle(facturaComponent.getDetalleBorrados());
                facturasService.updateWithDetalle(facturaComponent.getFactura(),facturaComponent.getDetalleBorrados());
                facturaComponent.inicializaDetalleBorrados();
                flash.addFlashAttribute("alertSuccess", "Factura nº " + factura.getNumFactura() + " actualizada");
                flash.addFlashAttribute("factura", facturaComponent.getFactura());
                flash.addFlashAttribute("showSubmit", false);
                return "redirect:/admin/facturas";
            } catch (Exception ex) {
                flash.addFlashAttribute("alertDanger", "Factura nº " + factura.getNumFactura() + " NO actualizada");
                flash.addFlashAttribute("factura", factura);
                flash.addFlashAttribute("showSubmit", true);
                return "redirect:/admin/facturas/update/" + factura.getNumFactura();
            }
        } else if (btCancel != null) {
            model.addAttribute("alertInfo", "Factura nº " + factura.getNumFactura() + " cancelada");
            return "redirect:/admin/facturas";
        } else if (btAddArticulo != null) {
            facturaComponent.addDetalle();
        } else if (btDeleteArticulo != null) {
            int pos = Integer.parseInt(btDeleteArticulo);
            facturaComponent.deleteDetalle(pos);
        } else if (detalleEditado!=null){  // Submit por change en select Articulo
            facturaComponent.completaDetalle(detalleEditado);
        }

        model.addAttribute("showSubmit", true);

        return "admin/facturas/update";
    }


    @GetMapping({"","/list"})
    public String list(Model model) {
        if (model.getAttribute("facturas") == null)
            model.addAttribute("facturas", facturasService.listAll()); // Hay que paginar
        model.addAttribute("facturasService", facturasService);
        return "admin/facturas/list";
    }

    @PostMapping({"","/list"})
    public String list(@RequestParam(required = false) String numFactura, @RequestParam(required = false) String nif, RedirectAttributes flash, Model model) {
        List<Factura> facturas;
        if (numFactura != null && !numFactura.isEmpty())
            facturas = facturasService.listByNumFactura(numFactura);
        else if (nif != null && !nif.isEmpty())
            facturas = facturasService.listByNif(nif);
        else
            facturas = facturasService.listAll();
        flash.addFlashAttribute("numFactura", numFactura);
        flash.addFlashAttribute("nif", nif);
        flash.addFlashAttribute("facturas", facturas);
        return "redirect:/admin/facturas";
    }

    //-----------------
    @ModelAttribute
    public void addAttributes(Model model) {
        model.addAttribute("usuarios", usuariosService.listAll());
        model.addAttribute("articulos", articulosService.listAll());
    }

}
*/