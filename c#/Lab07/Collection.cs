using System;
using System.Collections;

namespace CntDB.Lab.Lab07
{
    internal class Collection
    {

    }

    class Product
    {
        string name;
        double cost;
        int onhand;
        public Product(string name, double cost, int onhand)
        {
            this.name = name;
            this.cost = cost;
            this.onhand = onhand;
        }

        public override string ToString()
        {
            return String.Format("{0,-10}Cost: {1,6:C} On hand: {2}", name, cost, onhand);

        }
    }
    class Program
    {
        public static void Main(string[] args)
        {
            ArrayList inv = new ArrayList();
            // Add
            inv.Add(new Product("A", 5.9, 3));
            inv.Add(new Product("B", 2.5, 1));
            Console.WriteLine("Product list: ");
            foreach (Product i in inv)
            {
                Console.WriteLine(" " + i);
            }
        }
    }
}
