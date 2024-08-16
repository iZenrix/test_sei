package com.example.test_sei.service;

import com.example.test_sei.model.Lokasi;
import com.example.test_sei.model.Proyek;
import com.example.test_sei.repository.LokasiRepository;
import com.example.test_sei.repository.ProyekRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;
import java.util.Optional;
import java.util.stream.Collectors;

@Service
public class ProyekService {

    @Autowired
    private ProyekRepository proyekRepository;

    @Autowired
    private LokasiRepository lokasiRepository; 

    public Proyek saveProyek(Proyek proyek) {
        // Cek dan ambil data Lokasi berdasarkan id
        List<Lokasi> lokasiList = proyek.getLokasi().stream()
            .map(lokasi -> lokasiRepository.findById(lokasi.getId())
                .orElseThrow(() -> new RuntimeException("Lokasi dengan id " + lokasi.getId() + " tidak ditemukan"))
            )
            .collect(Collectors.toList());
        
        proyek.setLokasi(lokasiList);
        return proyekRepository.save(proyek);
    }

    public List<Proyek> getAllProyek() {
        return proyekRepository.findAll();
    }

    public Optional<Proyek> getProyekById(Integer id) {
        return proyekRepository.findById(id);
    }

    public Proyek updateProyek(Proyek proyek) {
        return proyekRepository.save(proyek);
    }

    public void deleteProyek(Integer id) {
        proyekRepository.deleteById(id);
    }
}
