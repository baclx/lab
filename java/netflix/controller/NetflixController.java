package controller;

import java.util.Iterator;
import java.util.List;

import model.Netflix;
import respository.NetflixRespository;

public class NetflixController {
	
	NetflixRespository netflixRespository = new NetflixRespository();
	
	public void searchMovieByName(List<Netflix> list, String name) {
		for(int i = 0; i < list.size(); i++) {
			if(list.get(i).getTitle().contains(name)) {
				System.out.println(list.get(i)); // toString
			}
		}
	}
	
	public void searchMovieByCategory(List<Netflix> list, String category) {
		for(int i = 0; i < list.size(); i++) {
			if(list.get(i).getCategory().contains(category)) {
				System.out.println(list.get(i));
			}
		}
	}
	
	public void searchMovieByLanguage(List<Netflix> list, String language) {
		for(int i = 0; i < list.size(); i++) {
			if(list.get(i).getLanguage().contains(language)) {
				System.out.println(list.get(i));
			}
		}
	}
	
	public void countMovieByCategory() {
		
	}
	
}
