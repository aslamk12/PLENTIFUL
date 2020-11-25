package com.example.plentiful;
import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.ProgressBar;
import android.widget.Toast;
import android.content.Context;
import android.content.Intent;
import android.view.ContextMenu;
import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;


import com.bumptech.glide.Glide;

import java.util.List;

public class HomelistAdapter extends RecyclerView.Adapter<HomelistAdapter.HomeViewHolder>{

    private Context mCtx;
    private List<Homelist> homelists;

    public HomelistAdapter(Context mCtx, List<Homelist> homelists) {
        this.mCtx = mCtx;
        this.homelists = homelists;
    }
    @NonNull
    @Override
    public HomelistAdapter.HomeViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {

        LayoutInflater inflater = LayoutInflater.from(mCtx);
        View view = inflater.inflate(R.layout.homelist, null );

        return new HomelistAdapter.HomeViewHolder(view);
    }
    @Override
    public void onBindViewHolder(@NonNull HomelistAdapter.HomeViewHolder holder, int position) {

        Homelist homelist = homelists.get(position);
        Glide.with(mCtx)
                .load(homelist.getPimage())
                .into(holder.imageView);

        holder.tv_pname.setText(homelist.getPname());

    }
    @Override
    public int getItemCount() {
        return homelists.size();
    }
    class HomeViewHolder extends RecyclerView.ViewHolder implements View.OnClickListener {

        private final Context context;
        TextView tv_pname;
        ImageView imageView;

        public HomeViewHolder(View itemView) {
            super(itemView);

            context = itemView.getContext();
            itemView.setOnClickListener(this);
            imageView = itemView.findViewById(R.id.iv_home);
            tv_pname = itemView.findViewById(R.id.tv_pname);
        }

        @Override
        public void onClick(View v) {

            Intent intent = new Intent();

            for (int i = 0; i < getItemCount(); i++) {
                if (v == itemView) {
                    intent = new Intent(context, Product_Details.class);
                    intent.putExtra("product_id", homelists.get(getLayoutPosition()).getPid());
                    context.startActivity(intent);
                    break;
                }
            }
        }
    }

}
