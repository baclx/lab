package respository;

import java.io.FileNotFoundException;
import java.io.FileReader;
import java.lang.reflect.Type;
import java.util.List;

import com.google.gson.Gson;
import com.google.gson.reflect.TypeToken;

import model.Netflix;

public class NetflixRespository {
	public List<Netflix> netflixList; // property
	
	public void getData() {
		try {
			FileReader reader = new FileReader("film.json");
			// parse JSON text -> JSON object = GSON
			Type objecType = new TypeToken<List<Netflix>>(){}.getType();
			netflixList = new Gson().fromJson(reader, objecType);
			
			for (Netflix netflix : netflixList) {
				System.out.println(netflix); // <=> call file = call toString
			}
			
		}
		catch (FileNotFoundException e) {
			// TODO: handle exception
			e.printStackTrace();
		}
	}
	
	// read file
//	public static void main(String[] args) {
//		NetflixRespository netflixRespository = new NetflixRespository();
//		netflixRespository.getData();
//	}
}
	

