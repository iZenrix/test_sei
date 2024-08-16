package com.example.test_sei.initializer;

import com.example.test_sei.model.Lokasi;
import com.example.test_sei.repository.LokasiRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.CommandLineRunner;
import org.springframework.stereotype.Component;

@Component
public class DataInitializer implements CommandLineRunner {

    @Autowired
    private LokasiRepository lokasiRepository;

    @Override
    public void run(String... args) throws Exception {
        lokasiRepository.save(new Lokasi("Lokasi A", "Indonesia", "Jawa Barat", "Bandung"));
        lokasiRepository.save(new Lokasi("Lokasi B", "Indonesia", "DKI Jakarta", "Jakarta"));
    }
}
