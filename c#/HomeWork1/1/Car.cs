using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace HomeWork1
{
    internal class Car
    {
        // declare the fields
        public string Make;
        public string Model;
        public string Color;
        public int YearBuilt;
        // define the methods
        public void Start()
        {
            System.Console.WriteLine(Model + " started");
        }
        public void Stop()
        {
            System.Console.WriteLine(Model + " stopped");
        }

    }
}
