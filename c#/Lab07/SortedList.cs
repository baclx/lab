using System;
using System.Collections;

namespace CntDB.Lab.Lab07
{
    internal class Program1
    {
        public static void Main()
        {
            SortedList objSL = new SortedList();
            objSL.Add("4", "!");
            objSL.Add("2", "Player");
            objSL.Add("1", "Bro");
            Console.WriteLine("Number of Elements in objSL : {0}", objSL.Count);
            Console.WriteLine("\t-KEY-\t-VALUE-");
            for (int i = 0; i < objSL.Count; i++)
            {
                Console.WriteLine("\t{0}:\t{1}", objSL.GetKey(i),
                objSL.GetByIndex(i));
            }

        }
    }
}
