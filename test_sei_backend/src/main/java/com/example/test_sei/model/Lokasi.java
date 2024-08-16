package com.example.test_sei.model;

import jakarta.persistence.*;
import java.time.LocalDateTime;

@Entity
public class Lokasi {
    
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Integer id;

    private String namaLokasi;
    private String negara;
    private String provinsi;
    private String kota;
    private LocalDateTime createdAt = LocalDateTime.now();

    public Lokasi() {
    }
    
    public Lokasi(String namaLokasi, String negara, String provinsi, String kota) {
            this.namaLokasi = namaLokasi;
            this.negara = negara;
            this.provinsi = provinsi;
            this.kota = kota;
            this.createdAt = LocalDateTime.now();  // Set createdAt ke waktu sekarang
    }
 
    public Integer getId() {
        return id;
    }

    public void setId(Integer id) {
        this.id = id;
    }

    public String getNamaLokasi() {
        return namaLokasi;
    }

    public void setNamaLokasi(String namaLokasi) {
        this.namaLokasi = namaLokasi;
    }

    public String getNegara() {
        return negara;
    }

    public void setNegara(String negara) {
        this.negara = negara;
    }

    public String getProvinsi() {
        return provinsi;
    }

    public void setProvinsi(String provinsi) {
        this.provinsi = provinsi;
    }

    public String getKota() {
        return kota;
    }

    public void setKota(String kota) {
        this.kota = kota;
    }

    public LocalDateTime getCreatedAt() {
        return createdAt;
    }

    public void setCreatedAt(LocalDateTime createdAt) {
        this.createdAt = createdAt;
    }
}

