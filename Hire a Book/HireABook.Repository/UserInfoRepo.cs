using HireABook.Entity;
using System;
using System.Collections.Generic;
using System.Data.Entity;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace HireABook.Repository
{
    public class UserInfoRepo
    {
        private DataContext DataContextOb = DataContext.getInstance();
        public List<UserInfo> GetAll()
        {
            List<UserInfo> userInfoList = DataContextOb.UserInfo.ToList();

            return userInfoList;
        }

        public int InsertUserInfo(UserInfo userInfoOb)
        {
            DataContextOb.Set<UserInfo>().Add(userInfoOb);
            return DataContextOb.SaveChanges();
        }

        
        public int UpdateUserInfo(UserInfo userInfoOb)
        {
            DataContextOb.Entry<UserInfo>(userInfoOb).State = EntityState.Modified;
            return DataContextOb.SaveChanges();

        }

        public UserInfo GetByUserName(string UserName)
        {
            UserInfo ret = DataContextOb.Set<UserInfo>().Where(x => x.UserName == UserName).FirstOrDefault();
            return ret; 
        }

        public UserInfo GetById(int Id)
        {
            UserInfo ret = DataContextOb.Set<UserInfo>().Where(x => x.UserId == Id).FirstOrDefault();
            return ret;
        }

    }
}
