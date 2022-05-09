package com.daw2.proyectospringfinal.controller;

import com.daw2.proyectospringfinal.model.entity.Articulo;
import com.daw2.proyectospringfinal.service.ArticulosService;
import com.daw2.proyectospringfinal.service.ProveedoresService;
import com.daw2.proyectospringfinal.service.UploadFileService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.access.annotation.Secured;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.multipart.MultipartFile;
import org.springframework.web.servlet.mvc.support.RedirectAttributes;

import javax.validation.Valid;
import java.io.IOException;
import java.util.List;

@Controller
@RequestMapping("/admin/articulos")
@Secured("ROLE_ADMIN")
public class AdminArticulosController {
    @Autowired
    private ArticulosService articulosService;
    @Autowired
    private ProveedoresService proveedoresService;
    @Autowired
    private UploadFileService uploadFileService;

    @GetMapping("/add")
    public String add(@RequestParam(required = false) String referencia, Model model) {
        if (referencia != null) {
            Articulo articuloBusca = articulosService.getByRef(referencia);
            if (articuloBusca != null) {
                model.addAttribute("readonly", true);
                model.addAttribute("showSubmit", false);
                model.addAttribute("articulo", articuloBusca);
                model.addAttribute("alertDanger", "El articulo ya está dado de alta");
            } else {
                model.addAttribute("readonly", false);
                model.addAttribute("showSubmit", true);
                Articulo nuevoArticulo = new Articulo();
                nuevoArticulo.setRef(referencia);
                model.addAttribute("articulo", nuevoArticulo);
            }
        } else {
            model.addAttribute("readonly", true);
            model.addAttribute("articulo", new Articulo());
        }

        model.addAttribute("articulos", articulosService.listLastRows(10));
        model.addAttribute("proveedores", proveedoresService.listAll());
        return "admin/articulos/add";
    }

    @PostMapping("/add")
    public String add(@Valid Articulo articulo, BindingResult result, RedirectAttributes flash,
                      @RequestParam("file") MultipartFile imagen, Model model) {
        if (articulo.getProveedor().getId() == null)
            result.rejectValue("proveedor", "NotNull", "Debe indicar el provedor");

        if (result.hasErrors()) {
            model.addAttribute("showSubmit", true);
            model.addAttribute("proveedores", proveedoresService.listAll());
            return "admin/articulos/add";
        }
        cargaImagen(articulo, imagen, flash);
        try {
            articulosService.save(articulo);
            flash.addFlashAttribute("readonly", true);
            flash.addFlashAttribute("showSubmit", false);
            flash.addFlashAttribute("alertSuccess", "Articulo guardado");
        } catch (Exception ex) {
            flash.addFlashAttribute("readonly", false);
            flash.addFlashAttribute("showSubmit", true);
            flash.addFlashAttribute("alertDanger", "Articulo NO guardado");
            flash.addFlashAttribute("articulo", articulo);
        }
        model.addAttribute("proveedores", proveedoresService.listAll());
        return "redirect:/admin/articulos/add";
    }

    @GetMapping("/show/{ref}")
    public String show(@PathVariable String ref, Model model) {
        Articulo articulo = articulosService.getByRef(ref);
        if (articulo != null) {
            model.addAttribute("articulo", articulo);
            model.addAttribute("articulos", articulosService.listByProveedor(articulo.getProveedor().getId()));
        } else {
            model.addAttribute("articulo", new Articulo());
            model.addAttribute("alertWarning", "Articulo no encontrado");
        }

        model.addAttribute("proveedores", proveedoresService.listAll());
        return "admin/articulos/show";
    }


    @GetMapping("/delete/{ref}")
    public String delete(@PathVariable String ref, Model model) {
        Articulo articulo = articulosService.getByRef(ref);
        if (articulo != null) {
            model.addAttribute("showSubmit", true);
            model.addAttribute("articulo", articulo);
            model.addAttribute("articulos", articulosService.listByProveedor(articulo.getProveedor().getId()));
        } else {
            model.addAttribute("showSubmit", false);
            model.addAttribute("articulo", new Articulo());
            model.addAttribute("alertDanger", "Articulo NO encontrado");
        }

        model.addAttribute("proveedores", proveedoresService.listAll());
        return "admin/articulos/delete";
    }

    @PostMapping("/delete")
    public String delete(Articulo articulo, RedirectAttributes flash) {
        try {
            articulosService.delete(articulo.getId());
            flash.addFlashAttribute("alertSuccess", "Articulo borrado");
            flash.addFlashAttribute("articulo", new Articulo());
            flash.addFlashAttribute("showSubmit", false);
        } catch (Exception ex) {
            flash.addFlashAttribute("alertDanger", "Articulos NO borrado");
            flash.addFlashAttribute("articulo", articulo);
            flash.addFlashAttribute("showSubmit", true);
        }
        flash.addFlashAttribute("readonly", true);
        return "redirect:/admin/articulos";
    }

    @GetMapping("/update/{ref}")
    public String update(@PathVariable String ref, Model model) {
        Articulo articulo = articulosService.getByRef(ref);
        if (articulo != null) {
            model.addAttribute("showSubmit", true);
            model.addAttribute("articulo", articulo);
            model.addAttribute("readonly", false);
            model.addAttribute("articulos", articulosService.listByProveedor(articulo.getProveedor().getId()));
        } else {
            model.addAttribute("showSubmit", false);
            model.addAttribute("articulo", new Articulo());
            model.addAttribute("alertDanger", "Articulo NO encontrado");
            model.addAttribute("readonly", true);
        }

        model.addAttribute("proveedores", proveedoresService.listAll());
        return "admin/articulos/update";
    }

    @PostMapping("/update")
    public String update(@Valid Articulo articulo, BindingResult result, RedirectAttributes flash,
                         @RequestParam("file") MultipartFile imagen, Model model) {
        cargaImagen(articulo, imagen, flash);
        if (articulo.getProveedor().getId() == null)
            result.rejectValue("proveedor", "NotNull", "Debe indicar el provedor");

        if (result.hasErrors()) {
            model.addAttribute("showSubmit", true);
            model.addAttribute("proveedores", proveedoresService.listAll());
            return "admin/articulos/add";
        }
        try {
            articulosService.save(articulo);
            flash.addFlashAttribute("alertSuccess", "Articulo actualizado");
            flash.addFlashAttribute("articulo", new Articulo());
            flash.addFlashAttribute("showSubmit", false);
        } catch (Exception ex) {
            flash.addFlashAttribute("alertDanger", "Articulo NO actualizado");
            flash.addFlashAttribute("articulo", articulo);
            flash.addFlashAttribute("showSubmit", true);
        }
        return "redirect:/admin/articulos/update/" + articulo.getRef();
    }


    @GetMapping({"","/list"})
    public String list(Model model) {
        if (model.getAttribute("articulos") == null)
            model.addAttribute("articulos", articulosService.listAll()); // Hay que paginar
        return "admin/articulos/list";
    }

    @PostMapping({"","/list"})
    public String list(@RequestParam(required = false) String referencia, @RequestParam(required = false) String descripcion, RedirectAttributes flash, Model model) {
        List<Articulo> articulos = null;
        if (referencia != null && !referencia.isEmpty())
            articulos = articulosService.listByRef(referencia);
        else if (descripcion != null && !descripcion.isEmpty())
            articulos = articulosService.listByDescripcion(descripcion);
        flash.addFlashAttribute("referencia", referencia);
        flash.addFlashAttribute("descripcion", descripcion);
        flash.addFlashAttribute("articulos", articulos);
        return "redirect:/admin/articulos";
    }

//---------------

    private void cargaImagen(Articulo articulo, MultipartFile imagen, RedirectAttributes flash) {

        if (!imagen.isEmpty()) {
            if (articulo.getId() != null && articulo.getId() > 0 && articulo.getImagen() != null
                    && articulo.getImagen().length() > 0) {
                uploadFileService.delete(UploadFileService.DestinoUpload.ARTICULOS, articulo.getImagen());
            }
            String uniqueFilename = null;
            try {
                uniqueFilename = uploadFileService.copy(UploadFileService.DestinoUpload.ARTICULOS, imagen);
                flash.addFlashAttribute("alertInfo", "Guarda la imagen: " + uploadFileService.getFilenameSource(uniqueFilename));
            } catch (IOException e) {
                flash.addFlashAttribute("alertWarning", "No se pudo subir la imagen: " + uploadFileService.getFilenameSource(uniqueFilename));
            }
            articulo.setImagen(uniqueFilename);
        }
    }


}
