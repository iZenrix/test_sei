package com.example.test_sei.controller;

import com.example.test_sei.model.Proyek;
import com.example.test_sei.service.ProyekService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.List;
import java.util.Optional;

@RestController
@RequestMapping("/api/proyek")
public class ProyekController {

    @Autowired
    private ProyekService proyekService;

    @PostMapping
    public ResponseEntity<Proyek> createProyek(@RequestBody Proyek proyek) {
        return ResponseEntity.ok(proyekService.saveProyek(proyek));
    }

    @GetMapping
    public ResponseEntity<List<Proyek>> getAllProyek() {
        return ResponseEntity.ok(proyekService.getAllProyek());
    }
    
    @GetMapping("/{id}")
    public ResponseEntity<Proyek> getProyekById(@PathVariable("id") Integer id) {
        Optional<Proyek> proyek = proyekService.getProyekById(id);
        if (proyek.isPresent()) {
            return ResponseEntity.ok(proyek.get());
        } else {
            return ResponseEntity.notFound().build();
        }
    }

    @PutMapping("/{id}")
    public ResponseEntity<Proyek> updateProyek(@PathVariable("id") Integer id, @RequestBody Proyek proyek) {
        proyek.setId(id);
        return ResponseEntity.ok(proyekService.updateProyek(proyek));
    }

    @DeleteMapping("/{id}")
    public ResponseEntity<Void> deleteProyek(@PathVariable("id") Integer id) {
        proyekService.deleteProyek(id);
        return ResponseEntity.ok().build();
    }
}

