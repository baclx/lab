using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace CntDB.Lab.Lab08.generic_class
{
    internal class Program
    {
        //public static void Main(string[] args)
        //{
        //    Pair<String> pair = new Pair<string>("An", "Nga");
        //    Console.WriteLine("({0},{1})", pair.First, pair.Second);
        //}

        // generic method
        //public static void Main()
        //{
        //    String a = "a";
        //    String b = "b";
        //    Swap<String>(ref a, ref b);
        //    System.Console.WriteLine(a + " " + b);
        //}
        //static void Swap<T>(ref T lhs, ref T rhs)
        //{
        //    T temp = lhs;
        //    lhs = rhs;
        //    rhs = temp;
        //}

        // using nullable type
        public static void Main()
        {
            // Test in case retuen null
            //Console.WriteLine("{0}", Min(null));

            // Add data to list
            List<int> list = new List<int>();
            list.Add(10);
            list.Add(1);
            list.Add(11);

            // Test in case does not return null
            Console.WriteLine("{0}", GetFirst(list));
        }
        private static int? GetFirst(List<int> list)
        {
            if (list == null || list.Count == 0)
            {
                return null;
            }
            return list[0];
        }
    }
}
