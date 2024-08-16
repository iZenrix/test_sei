package com.example.test_sei.controller;

import com.example.test_sei.model.Lokasi;
import com.example.test_sei.service.LokasiService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.List;
import java.util.Optional;

@RestController
@RequestMapping("/api/lokasi")
public class LokasiController {

    @Autowired
    private LokasiService lokasiService;

    @PostMapping
    public ResponseEntity<Lokasi> createLokasi(@RequestBody Lokasi lokasi) {
        return ResponseEntity.ok(lokasiService.saveLokasi(lokasi));
    }

    @GetMapping
    public ResponseEntity<List<Lokasi>> getAllLokasi() {
        return ResponseEntity.ok(lokasiService.getAllLokasi());
    }

    //get lokasi by id
    @GetMapping("/{id}")
    public ResponseEntity<Optional<Lokasi>> getLokasiById(@PathVariable("id") Integer id) {
        return ResponseEntity.ok(lokasiService.getLokasiById(id));
    }

    @PutMapping("/{id}")
    public ResponseEntity<Lokasi> updateLokasi(@PathVariable("id") Integer id, @RequestBody Lokasi lokasi) {
        lokasi.setId(id);
        return ResponseEntity.ok(lokasiService.updateLokasi(lokasi));
    }

    @DeleteMapping("/{id}")
    public ResponseEntity<Void> deleteLokasi(@PathVariable("id") Integer id) {
        lokasiService.deleteLokasi(id);
        return ResponseEntity.ok().build();
    }
}

