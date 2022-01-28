using HireABook.Entity;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace HireABook.Repository
{
    public class BorrowInfoRepo
    {
        DataContext DataContextOb = DataContext.getInstance();

        public int InsertBorrowInfo(BorrowInfo borrowInfo)
        {
            DataContextOb.Set<BorrowInfo>().Add(borrowInfo);
            return DataContextOb.SaveChanges();
        }
    }
}
