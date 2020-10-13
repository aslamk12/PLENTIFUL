package com.example.plentiful;

public class Buyer {
    private int bid;

    private String full_name,mobile,email,dob;

    public Buyer(int bid, String full_name, String mobile, String email, String dob) {
        this.bid = bid;
        this.full_name = full_name;
        this.mobile = mobile;
        this.email = email;
        this.dob = dob;
    }

    public Buyer() {
    }

    public int getBid() {
        return bid;
    }

    public void setBid(int bid) {
        this.bid = bid;
    }

    public String getFull_name() {
        return full_name;
    }

    public void setFull_name(String full_name) {
        this.full_name = full_name;
    }

    public String getMobile() {
        return mobile;
    }

    public void setMobile(String mobile) {
        this.mobile = mobile;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getDob() {
        return dob;
    }

    public void setDob(String dob) {
        this.dob = dob;
    }
}
