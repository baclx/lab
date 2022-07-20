using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace CntDB.Lab.Lab08.generic_class
{
    internal class Pair<T>
    {
        private T first;
        private T second;

        public Pair(T first, T second)
        {
            this.first = first;
            this.second = second;
        }

        public T First
        {
            get { return first; }
        }

        public T Second
        {
            get { return second; }
        }

    }
}
