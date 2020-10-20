package com.example.plentiful;

import androidx.appcompat.app.AppCompatActivity;
import android.content.Intent;
import android.widget.TextView;
import android.util.Log;
import android.util.Patterns;
import android.view.View;
import android.os.Handler;

import android.os.Bundle;

public class HomeActivity extends AppCompatActivity {
    TextView my_profile,category;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home);
        my_profile=(TextView)findViewById(R.id.tv_profile);
        category=(TextView)findViewById(R.id.tv_category);
        my_profile.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent regIntent = new Intent(HomeActivity.this,ProfileActivity.class);
                startActivity(regIntent);

            }
        });
        category.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent regIntent = new Intent(HomeActivity.this,CategoryActivity.class);
                startActivity(regIntent);

            }
        });
    }
}