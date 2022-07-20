using System;
using System.Collections;

namespace CntDB.Lab.Lab07
{
    internal class Program2
    {
        public static void Main()
        {
            Hashtable ht = new Hashtable();
            ht.Add("a", "A");
            ht.Add("b", "B");
            ht.Add("c", "C");
            ht["f"] = "F";
            // get a collection of the keys
            ICollection c = ht.Keys;
            foreach  (string str in c)
            {
                Console.WriteLine(str + ": " + ht[str]);
            }
        }
    }
}
