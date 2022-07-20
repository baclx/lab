using System;
using CntDB.exam;
using static CntDB.exam.Program;

namespace CntDB.exam
{
    internal class Menu
    {
        static void Main()
        {
            int choose = 0;


            while (choose < 5)
            {
                Meo();
                choose = int.Parse(Console.ReadLine());

                switch (choose)
                {
                    case 1:
                        Console.WriteLine("Enter your product name");
                        string Name = Console.ReadLine();
                        Console.WriteLine("Enter your product price");
                        int Price = int.Parse(Console.ReadLine());
                        CreateData(Name, Price);
                        break;
                    case 2:
                        ReadData();
                        break;
                    case 3:
                        int Id = int.Parse(Console.ReadLine());
                        DeleteData(Id);
                        break;
                    case 4:
                        break;
                }
            }
        }
        public static void Meo()
        {
            Console.WriteLine("========== Actions========= \n" +
                                "1. Add product \n" +
                                "2. View all product \n" +
                                "3. Delete product by ID\n" +
                                "4. End");
            Console.WriteLine("Enter your choose: ");
        }
    }
}
