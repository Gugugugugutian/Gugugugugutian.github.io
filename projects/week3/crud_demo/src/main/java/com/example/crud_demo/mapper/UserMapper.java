package com.example.crud_demo.mapper;

import com.example.crud_demo.entity.User;
import org.apache.ibatis.annotations.Mapper;

import java.util.List;

@Mapper
public interface UserMapper {
    List<User> ListUser();
    List<User> findUserByName(String userName);
    List<User> queryPage(Integer startRows);
    int getRowCount();
    int insertUser(User user);
    int delete(int userId);
    int Update(User user);
}