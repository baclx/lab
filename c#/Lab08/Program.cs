using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace CntDB.Lab.Lab08
{
    internal class Program
    {
        public static void Main()
        {
            List<Product> inv = new List<Product>();
            // Add elements to the list
            inv.Add(new Product("A", 5.4, 3));
            inv.Add(new Product("B", 1.2, 4));
            inv.Add(new Product("C", 3.2, 5));
            Console.WriteLine("Product list: ");
            foreach (Product product in inv)
            {
                Console.WriteLine(" " + product);
            }
        }
    }
}
