package EmployeeManagementSystem.model;

import EmployeeManagementSystem.entity.Employee;

import java.util.Map;
import java.util.Scanner;
import java.util.HashMap;

class CustomException extends Exception {
	private static final long serialVersionUID = 1L;

	public CustomException(String str) {
		super();
		System.out.println(str);
		EmployeeSystem.operations();
	}
}

public class EmployeeSystem {

	public static Map<Integer, Employee> map = new HashMap<>();

	public static void addEmployee(String name, int age, int id) {
		Employee emp = new Employee(name, age, id);
		map.put(id, emp);

		operations();
	}

	public static void deleteEmployee(int EmpId) throws CustomException {
		if (map.containsKey(EmpId)) {
			map.remove(EmpId);
			System.out.println("Success fully deleted from the list");
		} else {
			throw new CustomException("Not found Exception");
		}

		operations();
	}

	public static void searchEmployee(int EmpId) throws CustomException {
		if (map.containsKey(EmpId)) {
			System.out.println("Employee Details: " + map.get(EmpId));
		} else {
			throw new CustomException("Not found Exception");
		}

		operations();
	}

	public static void EmployeeList() {
		System.out.println(map.toString());
	}

	public static void operations() {
		System.out.println("\n********* Employee Management system **********");
		System.out.println("1: Add Emp");
		System.out.println("2: Delete Emp");
		System.out.println("3: Search Emp");
		System.out.println("4: List Emp");

		Scanner scanner = new Scanner(System.in);
		int userInput = scanner.nextInt();

		switch (userInput) {
			case 1: {
				System.out.println("Enter Emp details (name, age, id)");
				Scanner scanner1 = new Scanner(System.in);
				
				String name = scanner1.next();
				int age = scanner1.nextInt();
				int id = scanner1.nextInt();
				
				if(!name.equals("") && age != 0 && id != 0) {
					addEmployee(name, age, id);
				}
				break;
			}
			case 2: {
				System.out.println("Enter Emp id");
				Scanner scanner2 = new Scanner(System.in);
				
				int EmpId = scanner2.nextInt();
				
				try {
					deleteEmployee(EmpId);
				} catch (Exception e) {
					// TODO: handle exception
					System.out.println("incorrect");
				}
			}
			case 3: {
				System.out.println("Enter Emp id");
				Scanner scanner3 = new Scanner(System.in);
				
				int EmpId = scanner3.nextInt();
				
				try {
					searchEmployee(EmpId);
				} catch (Exception e) {
					// TODO: handle exception
				}
			}
			case 4: {
				EmployeeList();  
				
				operations();
			}
		}
	}
	
	public static void main(String[] args) {
		System.out.println("Enter your choice");
		operations();
	}
}