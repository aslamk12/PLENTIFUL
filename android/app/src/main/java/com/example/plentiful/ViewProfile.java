package com.example.plentiful;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.MenuItem;
import android.view.View;
import android.widget.TextView;

import com.google.android.material.bottomnavigation.BottomNavigationView;

public class ViewProfile extends AppCompatActivity {
    TextView edit_profile,my_orders,tv_signout;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_view_profile);
        BottomNavigationView bottomNavigationView = findViewById(R.id.bottom_navigation);

        bottomNavigationView.setSelectedItemId(R.id.profile_nav);
        bottomNavigationView.setOnNavigationItemSelectedListener(new BottomNavigationView.OnNavigationItemSelectedListener() {
            @Override
            public boolean onNavigationItemSelected(@NonNull MenuItem item) {
                switch (item.getItemId()){
                    case R.id.profile_nav:

                        return true;

                    case R.id.category_nav:
                        startActivity(new Intent(getApplicationContext(),CategoryActivity.class));
                        overridePendingTransition(0,0);
                        return true;

                    case R.id.home_nav:
                        startActivity(new Intent(getApplicationContext(),HomeActivity.class));
                        overridePendingTransition(0,0);
                        return true;

                    case R.id.cart_nav:
                        startActivity(new Intent(getApplicationContext(),CartActivity.class));
                        overridePendingTransition(0,0);
                        return true;

                    case R.id.sign_out:
                        SharedPrefManager.getInstance(getApplicationContext()).logout();
                        return true;
                }
                return false;
            }
        });
        edit_profile=(TextView)findViewById(R.id.tv_edit_profile);
        my_orders=(TextView)findViewById(R.id.tv_my_orders);
        tv_signout = findViewById(R.id.tv_signout);
        edit_profile.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent regIntent = new Intent(ViewProfile.this,ProfileActivity.class);
                startActivity(regIntent);

            }
        });
        my_orders.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent regIntent = new Intent(ViewProfile.this,MyOrders.class);
                startActivity(regIntent);

            }
        });

        tv_signout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                SharedPrefManager.getInstance(getApplicationContext()).logout();

            }
        });
    }
}