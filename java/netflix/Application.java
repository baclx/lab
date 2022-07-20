
import java.util.Collections;
import java.util.Comparator;
import java.util.List;
import java.util.Scanner;

import controller.NetflixController;
import model.Netflix;
import respository.NetflixRespository;

public class Application {
	
	public static void main(String[] args) {
		
		NetflixRespository netflixRespository = new NetflixRespository();
		NetflixController netflixController = new NetflixController();
		
		netflixRespository.getData();
		
		System.out.println("---------------------------------------");
		
		Scanner scanner = new Scanner(System.in);
		// list cac obj gan cho netflixList
		List<Netflix> netflixList = netflixRespository.netflixList;
		
		while(true) {
			menu();
			int ch = scanner.nextInt();
			scanner.nextLine(); // cho phep xg dong...
			
			switch (ch) {
			case 1: {
				// sap xeo theo ten sd ham sort() cua Collection(s)
				System.out.println("Movie sau khi sort");
				Collections.sort(netflixList, new Comparator<Netflix>() {
					@Override
					public int compare(Netflix o1, Netflix o2) {
						return o1.getTitle().compareTo(o2.getTitle()); 
					}
				});
				printResult(netflixList);
				break;
			}
			case 2: {
				System.out.println("nhap ten phim can tim: ");
				String name = scanner.nextLine();
				netflixController.searchMovieByName(netflixList, name);
				break;
			}
			case 3: {
				System.out.println("nhap the loai ban muon: ");
				String category = scanner.nextLine();
				netflixController.searchMovieByCategory(netflixList, category);
				break;
			}
			case 4: {
				System.out.println("nhap phim theo ngon ngu ban muon: ");
				String language = scanner.nextLine();
				netflixController.searchMovieByLanguage(netflixList, language);
				break;
			}
			case 5: {
				netflixController.countMovieByCategory();
				break;
			}
			case 6: {
				System.exit(0);
				break;
			}
			default:
				throw new IllegalArgumentException("Unexpected value: " + ch);
			}
		}
	}
	
	public static void menu() {
		System.out.println("chức năng: ");
		System.out.println("1. Sắp xếp theo title phim ");
		System.out.println("2. TÌm kiếm theo title ");
		System.out.println("3. TÌm kiếm theo category ");
		System.out.println("4. TÌm kiếm theo language ");
		System.out.println("5. Thống kê fim theo category ");
		System.out.println("6. Out");
	}
	
	public static void printResult(List<Netflix> list) {
		for (Netflix netflix : list) {
			System.out.println(netflix);
		}
	}
}
