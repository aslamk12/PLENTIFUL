package com.example.plentiful;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;

public class SharedPrefManager {
    private static final String SHARED_PREF_NAME = "plentifulsharedpref";
    private static final String KEY_BUYERNAME = "keybuyername";
    private static final String KEY_BUYERMOBILE = "keybuyermobile";
    private static final String KEY_BUYEREMAIL = "keybuyeremail";
    private static final String KEY_BUYERDOB = "keybuyerdob";
    private static final String KEY_BUYERID = "keybuyerid";

    private static SharedPrefManager mInstance;
    private static Context mCtx;

    private SharedPrefManager(Context context)
    {
        mCtx = context;
    }

    public static synchronized SharedPrefManager getInstance(Context context)
    {
        if (mInstance == null)
        {
            mInstance = new SharedPrefManager(context);
        }

        return mInstance;
    }

    public void buyerLogin(Buyer buyer)
    {
        SharedPreferences sharedPreferences = mCtx.getSharedPreferences(SHARED_PREF_NAME,Context.MODE_PRIVATE);
        SharedPreferences.Editor editor = sharedPreferences.edit();
        editor.putInt(KEY_BUYERID, buyer.getBid());
        editor.putString(KEY_BUYERNAME, buyer.getFull_name());
        editor.putString(KEY_BUYERMOBILE, buyer.getMobile());
        editor.putString(KEY_BUYEREMAIL, buyer.getEmail());
        editor.putString(KEY_BUYERDOB, buyer.getDob());
        editor.apply();
    }

    public boolean isLoggedIn()
    {
        SharedPreferences sharedPreferences = mCtx.getSharedPreferences(SHARED_PREF_NAME,Context.MODE_PRIVATE);
        return sharedPreferences.getString(KEY_BUYERNAME,null) != null;
    }

    public Buyer getUser()
    {
        SharedPreferences sharedPreferences = mCtx.getSharedPreferences(SHARED_PREF_NAME,Context.MODE_PRIVATE);
        return new Buyer(
                sharedPreferences.getInt(KEY_BUYERID,-1),
                sharedPreferences.getString(KEY_BUYERNAME,null),
                sharedPreferences.getString(KEY_BUYERMOBILE,null),
                sharedPreferences.getString(KEY_BUYEREMAIL,null),
                sharedPreferences.getString(KEY_BUYERDOB,null)
        );
    }

    public void logout()
    {
        SharedPreferences sharedPreferences = mCtx.getSharedPreferences(SHARED_PREF_NAME,Context.MODE_PRIVATE);
        SharedPreferences.Editor editor = sharedPreferences.edit();
        editor.clear();
        editor.apply();
        mCtx.startActivity(new Intent(mCtx, LoginActivty.class));
    }


}
